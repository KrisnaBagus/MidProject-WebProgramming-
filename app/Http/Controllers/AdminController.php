<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    // Hardcoded credentials
    private $username = 'admin';
    private $password = 'krisna123';

    public function login()
    {
        // Check if already logged in via session or cookie
        if (session('admin_logged_in') || Cookie::get('remember_admin')) {
            if (!session('admin_logged_in')) {
                session(['admin_logged_in' => true]);
            }
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $remember = $request->has('remember');

        if ($credentials['username'] === $this->username && $credentials['password'] === $this->password) {
            session(['admin_logged_in' => true]);

            if ($remember) {
                // Set cookie for 30 days
                Cookie::queue('remember_admin', 'authenticated', 43200); 
            }

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['message' => 'Invalid username or password']);
    }

    public function dashboard()
    {
        if (!session('admin_logged_in') && !Cookie::get('remember_admin')) {
            return redirect()->route('admin.login');
        }

        if (!session('admin_logged_in')) {
            session(['admin_logged_in' => true]);
        }

        return view('admin.dashboard');
    }

    public function logout()
    {
        Session::forget('admin_logged_in');
        Cookie::queue(Cookie::forget('remember_admin'));
        return redirect()->route('admin.login');
    }
}
