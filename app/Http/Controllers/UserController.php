<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    /**
     * Redireciona os dados para o serviço de validação e inserção.
     * @param Request $request
     * @param UserService $userService
     * @return mixed
     */
    public function store(Request $request)
    {
        return $this->userService->store($request->all());
    }

    /**
     * Redireciona os dados para o serviço de validação e atualização.
     * @param Request $request
     * @param UserService $userService
     * @return mixed
     */
    public function update(Request $request)
    {
        return $this->userService->update($request->all());
    }

}
