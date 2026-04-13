<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PasswordResetToken;
use Illuminate\Support\Facades\Mail;
use App\Mail\AgentResetPasswordMail;

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
}
