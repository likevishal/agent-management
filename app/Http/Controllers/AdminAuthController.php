<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    //

    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
