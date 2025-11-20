<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Freelancer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    // عرض نموذج إضافة تقييم (إذا كنا نستخدم نموذج منفصل)
    // لكننا سنقوم بإضافة التقييم عبر نموذج في صفحة المنشور نفسه.

    // تخزين تقييم جديد
    public function store(Request $request, Freelancer $freelancer)
    {
        // التحقق من أن المستخدم مسجل الدخول
        if (!Auth::check()) {
            return redirect()->route('home')->with('error', 'يجب تسجيل الدخول لتقييم هذا المنشور.');
        }

        // التحقق من أن المستخدم لم يقم بالتقييم مسبقاً
        if (Auth::user()->hasRated($freelancer)) {
            return back()->with('error', 'لقد قمت بتقييم هذا المنشور مسبقاً.');
        }

        // التحقق من البيانات
        $request->validate([
            'rating' => 'nullable|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ],[
            'rating.integer' => 'قيمة التقييم يجب أن تكون رقم صحيح.',
            'rating.min' => 'قيمة التقييم لا يمكن أن تكون أقل من 1.',
            'rating.max' => 'قيمة التقييم لا يمكن أن تكون أكثر من 5.',
            'comment.string' => 'التعليق يجب أن يكون نصاً.',
            'comment.max' => 'التعليق لا يمكن أن يتجاوز 1000 حرف.',
        ]);

        // التحقق من أن المستخدم لم يقم بتقييم هذا المنشور من قبل
        $existingRating = Rating::where('user_id', Auth::id())->where('freelancer_id', $freelancer->id)->first();
        if ($existingRating) {
            return back()->with('error', 'لقد قمت بتقييم هذا المنشور مسبقاً.');
        }

        // إنشاء التقييم
        Rating::create([
            'user_id' => Auth::id(),
            'freelancer_id' => $freelancer->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('status', 'تم إضافة التقييم بنجاح.');
    }

    // تحديث تقييم موجود
    public function update(Request $request, Rating $rating)
    {
        // نتحقق أن المستخدم هو صاحب التقييم
        if (Auth::id() !== $rating->user_id) {
            return back()->with('error', 'غير مسموح بتعديل هذا التقييم.');
        }

        $request->validate([
            'rating' => 'nullable|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ],[
            'rating.integer' => 'قيمة التقييم يجب أن تكون رقم صحيح.',
            'rating.min' => 'قيمة التقييم لا يمكن أن تكون أقل من 1.',
            'rating.max' => 'قيمة التقييم لا يمكن أن تكون أكثر من 5.',
            'comment.string' => 'التعليق يجب أن يكون نصاً.',
            'comment.max' => 'التعليق لا يمكن أن يتجاوز 1000 حرف.',
        ]);

        $rating->update([
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('status', 'تم تحديث التقييم بنجاح.');
    }

    // حذف تقييم
    public function destroy(Rating $rating)
    {
        // نتحقق أن المستخدم هو صاحب التقييم
        if (Auth::id() !== $rating->user_id) {
            return back()->with('error', 'غير مسموح بحذف هذا التقييم.');
        }

        $rating->delete();

        return back()->with('status', 'تم حذف التقييم بنجاح.');
    }
}
