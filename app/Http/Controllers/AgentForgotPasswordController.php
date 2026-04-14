<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PasswordResetToken;
use Illuminate\Support\Facades\Mail;
use App\Mail\AgentResetPasswordMail;
use App\Models\Agent;
use Illuminate\Support\Facades\Hash;

class AgentForgotPasswordController extends Controller
{
    //

    public function showForgotForm()
    {
        return view('agent.auth.forgot');
    }

    public function sendResetLink(Request $request)
    {

        $request->validate(
            [
                'email' => 'required|email'
            ]
        );

        $token = '123456';

        PasswordResetToken::where('email', $request->email)->delete();

        PasswordResetToken::create([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);

        Mail::to($request->email)->send(new AgentResetPasswordMail($token));

        return back()->with('success', 'Reset link successfully');
    }

    public function showResetForm($token)
    {
        return view('agent.auth.reset', compact('token'));
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

        if (!$record) {
            return back()->with('error', 'Invalid Request');
        }

        if (now()->diffInMinutes($record->created_at) > 60) {
            return back()->with('error', 'token expired');
        }

        Agent::where('email', $request->email)
            ->update([
                'password' => Hash::make($request->password)
            ]);

        return redirect()->route('agent.login')->with('success', 'Password reset successful.');
    }
}
