<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = auth()->user();

        if ($user->is_admin) {
            return redirect()->intended('/admin/dashboard');
        }

        return redirect()->intended('/profile'); // or any custom path for regular users
    }
}