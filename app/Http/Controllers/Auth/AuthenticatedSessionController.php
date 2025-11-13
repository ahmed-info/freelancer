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

    public function storeRole(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if ($request->role === 'freelance') {
            return redirect()->route('freelance.main')->with('status', 'مرحباً بك في لوحة تحكم فرصةين');
        } elseif ($request->role === 'project') {
            return redirect()->route('project.create')->with('status', 'مرحباً بك في لوحة تحكم المشاريع');
        } elseif ($request->role === 'company') {
            return redirect()->route('company.main')->with('status', 'مرحباً بك في لوحة تحكم الشركات');
        }else {
            return redirect('/')->with('error', 'نوع حساب غير معروف');
        }

        //return redirect()->intended(route('dashboard', absolute: false));
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
