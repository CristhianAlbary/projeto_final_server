<?php

namespace App\Models\Utils;

class Response
{
    /**
     * Return response json if request get a success
     * @param mixed $data
     * @return \Illuminate\Http\JsonResponse
     */
    public static function responseSuccess($data)
    {
        $security = new Security();
        return response()->json(['data' => $data, 'token' => $security->setToken(), 'success' => true, 'state' => Constants::$condition['200'][1]]);
    }

    /**
     * Return response json if request get a error
     * @param array $errors
     * @param array $condition
     * @return \Illuminate\Http\JsonResponse
     */
    public static function responseError(array $errors, array $condition)
    {
        $security = new Security();
        if($condition[0] == Constants::$condition['001'][0]){
            return response()->json(['errors' => $errors, 'token' => null, 'success' => false, 'state' => Constants::$condition['001'][1]]);
        }
        $security->setToken();
        return response()->json(['errors' => $errors, 'token' => $security->setToken(), 'success' => false, 'state' => $condition[1]]);
    }
}
