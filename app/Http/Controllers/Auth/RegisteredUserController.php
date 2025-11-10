<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

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
           // 'role' => ['required', 'in:freelance,project,company'],
        ]);

       // return $request->all();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        event(new Registered($user));

        Auth::login($user);

        //return $user;

        if ($request->role === 'freelance') {
            return redirect()->route('freelance.main')->with('status', 'مرحباً بك في لوحة تحكم فرصةين');
        } elseif ($request->role === 'project') {
            return redirect()->route('myprojects.create')->with('status', 'مرحباً بك في لوحة تحكم المشاريع');
        } elseif ($request->role === 'company') {
            return redirect()->route('company.main')->with('status', 'مرحباً بك في لوحة تحكم الشركات');
        }else {
            return redirect('/')->with('error', 'نوع حساب غير معروف');
        }


    }


}
