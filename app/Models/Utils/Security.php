<?php

namespace App\Models\Utils;

use App\Models\Entity\User;
use Illuminate\Support\Facades\Auth;

class Security
{

    /**
     * Verify if user have token, if token already exists delete this and create new token,
     * if not exists create a new token and send to authenticated user
     * @return string
     */
    public function setToken(): string
    {
        if(Auth::user()) {
            $user = User::find(Auth::user()['id']);
            if(Auth::user()->tokens) {
                Auth::user()->tokens->each(function($token) {
                    $token->delete();
                });
            }
            return $user->createToken('token')->accessToken;
        } else {
            return '';
        }
    }

}
