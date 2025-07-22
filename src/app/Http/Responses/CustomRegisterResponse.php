<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse;
use Illuminate\Http\Request;

class CustomRegisterResponse implements RegisterResponse
{
    public function toResponse($request)
    {
        return redirect()->route('register.step2'); // ← STEP2への遷移
    }
}
