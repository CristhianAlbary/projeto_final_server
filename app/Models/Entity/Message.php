<?php

namespace App\Models\Entity;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * @var
     */
    protected $fillable = [
        'id',
        'usu_origem',
        'usu_destino',
        'mensagem',
        'status'
    ];

    /**
     * @var
     */
    protected $table = 'message';

    public function userOrigem()
    {
        return $this->belongsTo(User::class, 'usu_origm', 'id');
    }

    public function userDestino()
    {
        return $this->belongsTo(User::class, 'usu_destino', 'id');
    }

}