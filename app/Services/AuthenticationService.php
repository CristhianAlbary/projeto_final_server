<?php

namespace App\Services;

use App\Models\Utils\Constants;
use App\Models\Entity\User;
use App\Models\Utils\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticationService
{
    /**
     * Authenticate user credentials for login
     * @param string $credentials
     * @return \Illuminate\Http\JsonResponse
     */
    public function userAuthenticate($credentials)
    {
        if(!Auth::attempt($credentials)) {
            return Response::responseError(['login' => Constants::$error_message['invalid-login']], Constants::$condition['001']);
        }
        $user = User::find(request()->user()['id']);
        return Response::responseSuccess($user);
    }
}
