<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin; // Pastikan model Admin ada

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/dashboard');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function showRegistrationForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        
        Admin::create($validated);

        return redirect()->route('admin.login')->with('success', 'Registration successful. Please login.');
    }
}
