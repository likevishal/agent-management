<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentForgotPasswordController extends Controller
{
    //

    public function showForgotForm() {
        return view('agent.auth.forgot');
    }
}
