<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;

class ObjectValidatorService
{
    /**
     * Inicia a validação de um objeto recebido por meio do nome da classe.
     * @param string $objectName
     * @param object $object
     * @return mixed
     */
    public function validate(String $objectName, $object)
    {
        $validator = $this->getValidator();
        return $validator[$this->getObjectNameByClass($objectName)]($object);
    }

    /**
     * Extrai o nome da classe para obter a função de validação.
     * @param string objectName
     * @return string $name
     */
    public function getObjectNameByClass(String $objectName)
    {
        $name = explode("\\", $objectName);
        return $name[sizeof($name) - 1];
    }

    /**
     * Valida um objeto recebio utilizando uma chave para acessar a função correta de validação.
     * @param Object $object
     * @return mixed
     */
    public function getValidator()
    {
        return [
            "User" => function($object) {
                $validator = Validator::make($object, [
                    'nome' => 'required|min:3|max:100',
                    'login' => 'required|min:5|max:100',
                    'password' => 'required|min:5|max:20',
                    'status' => 'required|min:1|max:1',
                    'tipo' => 'required|min:3|max:3',
                ]);
                if($validator->fails()) {
                    return response()->json(['errors' => $validator->errors(), 'origin' => 'user', 'success' => false]);
                }
                return true;
            },
            "Task" => function($object) {
                $validator = Validator::make($object, [
                    'usu_origem' => 'required',
                    'usu_destino' => 'required',
                    'descricao' => 'required',
                    'status' => 'required|min:1|max:1',
                ]);
                if($validator->fails()) {
                    return response()->json(['errors' => $validator->errors(), 'origin' => 'task', 'success' => false]);
                }
                return true;
            }
        ];
    }
}