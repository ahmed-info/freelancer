<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Freelancer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function profile(string $id)
    {
        $freelancer = Freelancer::with('projects')->find($id);
        //return $freelancer;
        return view('main.profile.profile', compact('freelancer'));
    }

    public function reviews(string $id, Request $request)
    {
        $freelancer = Freelancer::with('ratings.user')->withAvg('ratings', 'rating')
            ->withCount('ratings')
            ->findOrFail($id);

             // الحصول على معايير التصفية من Request
        $ratingFilter = $request->get('rating', 'all');
        $sortFilter = $request->get('sort', 'latest');

        // بناء query التقييمات مع التصفية
        $ratingsQuery = $freelancer->ratings()->with('user');

        // تطبيق تصفية النجوم
        if ($ratingFilter !== 'all') {
            $ratingsQuery->where('rating', $ratingFilter);
        }

        // تطبيق الترتيب
        switch ($sortFilter) {
            case 'highest':
                $ratingsQuery->orderBy('rating', 'DESC');
                break;
            case 'lowest':
                $ratingsQuery->orderBy('rating', 'ASC');
                break;
            default: // latest
                $ratingsQuery->orderBy('created_at', 'DESC');
        }

         $filteredRatings = $ratingsQuery->get();

        // حساب التوزيع بناء على التقييمات المصفاة
        $ratingDistribution = $this->calculateRatingDistribution($filteredRatings);
        $averageRating = $filteredRatings->avg('rating') ?? 0;
        $ratingsCount = $filteredRatings->count();

         // إذا كان الطلب Ajax، نرجع JSON
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'html' => view('partials.ratings_list', compact('filteredRatings'))->render(),
                'distribution' => $ratingDistribution,
                'stats' => [
                    'average' => number_format($averageRating, 1),
                    'count' => $ratingsCount
                ]
            ]);
        }

        return view('main.profile.reviews', compact('freelancer', 'ratingDistribution', 'averageRating', 'ratingsCount','ratingFilter','sortFilter','filteredRatings'));
    }

    private function calculateRatingDistribution($ratings)
    {
        $totalRatings = $ratings->count();

        if ($totalRatings === 0) {
            return collect();
        }

        $distribution = [];

        for ($stars = 5; $stars >= 1; $stars--) {
            $count = $ratings->where('rating', $stars)->count();
            $percent = $totalRatings > 0 ? round(($count / $totalRatings) * 100) : 0;

            $distribution[] = [
                'stars' => $stars,
                'count' => $count,
                'percent' => $percent
            ];
        }

        return collect($distribution);
    }

    public function portfolio(string $id)
    {
        $freelancer = Freelancer::find($id);
        return view('main.profile.portfolio', compact('freelancer'));
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
