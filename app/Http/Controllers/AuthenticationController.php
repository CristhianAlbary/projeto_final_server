<?php

namespace App\Http\Controllers;

use App\Services\AuthenticationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    /**
     * @var Request $request
     * @var AuthenticationRequest $authenticationService
     */
    private $request, $authenticationService;

    public function __construct(Request $request, AuthenticationService $authenticationService)
    {
        $this->request = $request;
        $this->authenticationService = $authenticationService;
    }

    /**
     * Authentication user credentials request to login success
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate()
    {
        $validator = Validator::make($this->request->all(), [
            'login' => 'required|max:30',
            'password' => 'required|max:50'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'success' => false], 400);
        }
        return $this->authenticationService->userAuthenticate(request(['login', 'password']));
    }
}