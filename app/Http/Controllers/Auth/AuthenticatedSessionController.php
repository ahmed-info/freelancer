<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    public function storeRole(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'credential' => 'required|string',
            'password' => 'required',
            'role' => 'required|in:freelance,project,company', // أضفنا التحقق من role
        ]);

        $isEmail = filter_var($validated['credential'], FILTER_VALIDATE_EMAIL);
        $field = $isEmail ? 'email' : 'phone';

        // محاولة تسجيل الدخول
        if (Auth::attempt([$field => $validated['credential'], 'password' => $validated['password']])) {
            $request->session()->regenerate();

            // التوجيه بناءً على role بعد نجاح تسجيل الدخول
            return match ($validated['role']) {
                'freelance' => redirect()->route('freelance.main')
                    ->with('status', 'مرحباً بك في لوحة تحكم فرصةين'),
                'project' => redirect()->route('project.create')
                    ->with('status', 'مرحباً بك في لوحة تحكم المشاريع'),
                'company' => redirect()->route('company.main')
                    ->with('status', 'مرحباً بك في لوحة تحكم الشركات'),
            };
        }

        // فشل تسجيل الدخول
        return back()->withErrors([
            'credential' => 'بيانات الدخول غير صحيحة',
        ])->onlyInput('credential');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
