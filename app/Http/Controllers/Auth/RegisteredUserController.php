<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Enums\UserRole;
use Illuminate\Validation\Rule;
enum Role: string
{
    case PROJECT = 'project';
    case FREELANCE = 'freelance';
}
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
            //'role' => ['required', Rule::enum(UserRole::class)]
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=> $request->role
        ]);

        event(new Registered($user));

        Auth::login($user);

            return $this->redirectBasedOnRole($user->role);

    }

    private function redirectBasedOnRole($role)
{
    return match($role) {
        'project' => redirect()->route('projects.main'),
        'freelance' => redirect()->route('freelance.main'),
        default => redirect()->route('dashboard')
    };
}
}
