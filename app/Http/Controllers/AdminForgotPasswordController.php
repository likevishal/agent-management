<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\PasswordResetToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminForgotPasswordController extends Controller
{
    //

    public function showForgotForm()
    {
        return view('admin.auth.forgot');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email'
            ]
        );

        $token = '12345678';

        PasswordResetToken::updateOrCreate(
            ['email' => $request->email],
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => now()
            ]
        );

        return back()->with('success', "Reset Link : /admin/reset-password/$token");
    }

    public function showResetForm($token)
    {
        return view('admin.auth.reset', compact('token'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $record = PasswordResetToken::where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if (now()->diffInMinutes($record->created_at) > 60) {
            return back()->with('error', 'Token expired');
        }

        if (!$record) {
            return back()->with('error', 'Invalid Request');
        }

        Admin::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        return redirect()->route('admin.login')->with('success', 'Password Reset Successful');
    }
}
