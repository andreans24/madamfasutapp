<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\Registered;
use App\Models\Admin;


class AuthController extends Controller
{
    // Form Login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Login
    public function login(Request $request)
    {
        $request->validate([
            'email-name' => 'required',
            'password' => 'required',
        ]);

        // Cek apakah input adalah email atau username
        $loginType = filter_var($request->input('email-name'), FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        // Sesuaikan kredensial login dengan tipe login yang terdeteksi
        $credentials = [
            $loginType => $request->input('email-name'),
            'password' => $request->input('password'),
        ];

        // Attempt login
        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email-name' => 'Email/UserName atau password failed.']);
    }

    // Form Register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Register
    public function registerSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'password' => 'required|string|min:8',
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => null, // atau `now()`
        ]);

        return redirect()->route('admin.register.form')->with('success', 'Registration successfully Please Sign in!');
    }

    // Form Lupa Password
    public function forgotPasswordForm()
    {
        return view('auth.forgot');
    }

    // Kirim Link Reset Password
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::broker('admins')->sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    // Form Reset Password
    public function showResetForm($token)
    {
        return view('auth.forgot', ['token' => $token]);
    }

    // Reset Password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $status = Password::broker('admins')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($admin, $password) {
                $admin->password = Hash::make($password);
                $admin->save();
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('admin.login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }

    // Logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
