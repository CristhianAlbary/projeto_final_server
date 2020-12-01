<?php

namespace App\Services;

use App\Models\Entity\User;
use Illuminate\Support\Facades\DB;

class UserService
{
    protected $validator;
    protected $user;

    public function __construct()
    {
        $this->validator = new ObjectValidatorService();
        $this->user = new User();
    }

    /**
     * Validar e inserir um usuário no banco de dados.
     * @param array $object
     * @return mixed
     */
    public function store($object)
    {
        try {
            DB::beginTransaction();
            $objectValidate = $this->validator->validate(User::class, $object);
            if (is_bool($objectValidate) && $objectValidate) {
                $object['password'] = bcrypt($object['password']);
                $user = new User($object);
                DB::commit();
                $user->save();
                return response()->json(['data' => $user, 'success' => true, 'state' => 200]);
            } else {
                return $objectValidate;
            }
        } catch (\Throwable $err) {
            DB::rollBack();
            return response()->json(['internal_error' => $err->getMessage(), 'line' => $err->getLine()]);
        }
    }

    /**
     * Validar e atualizar um usuário no banco de dados
     * @param array $object
     * @return mixed
     */
    public function update($object)
    {
        try {
            DB::beginTransaction();
            $objectValidate = $this->validator->validate(User::class, $object);
            if (is_bool($objectValidate) && $objectValidate) {
                $this->user = User::find($object['id']);
                $object['password'] = bcrypt($object['password']);
                $this->user->update($object);
            }
            DB::commit();
            return response()->json(['data' => $this->user, 'success' => true, 'state' => 200]);
        } catch (\Throwable $err) {
            DB::rollBack();
            return response()->json(['internal_error' => $err->getMessage(), 'line' => $err->getLine()]);
        }
    }
}
