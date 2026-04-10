<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AgentAuthController extends Controller
{
    public function showLogin()
    {
        return view('agent.login');
    }

    public function login(Request $request)
    {
        $remember = $request->has('remember');
        
        if (Auth::guard('agent')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ],$remember)) {
            return redirect('/agent/dashboard');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        Auth::guard('agent')->logout();
        return redirect('/agent/login');
    }
}
