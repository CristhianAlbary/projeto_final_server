<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Usando validators
    // $validator = Validator::make($request->all(), [
    //     'name' => 'required|max:20',
    //     'age' => 'required|numeric|max:10'
    // ]);
    // if($validator->fails()) {
    //     return response()->json(['errors' =>  $validator->errors()]);
    // }
}
