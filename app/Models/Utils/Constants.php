<?php

namespace App\Models\Utils;

class Constants {

    public static $condition = [
        "001" => ["login", 401],
        "002" => ["insert", 500],
        "003" => ["update", 500],
        "004" => ["delete", 500],
        "200" => ["ok", 200],
        "400" => ["bad-request", 400],
        "401" => ["unauthorized", 401],
        "404" => ["not-found", 404],
        "500" => ["internal-error", 500]
        
        
    ];

    public static $error_message = [
        'invalid-login' => 'Login ou senha incorretos.',
        'user-connected' => 'O usuário já está conectado.'
    ];

}
