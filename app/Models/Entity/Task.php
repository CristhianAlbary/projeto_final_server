<?php

namespace App\Models\Entity;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    /**
     * @var
     */
    protected $table = 'task';

    /**
     * @var
     */
    protected $fillable = [
        'id',
        'nome',
        'usu_origem',
        'usu_destino',
        'descricao',
        'status'
    ];

    public function userOrigem()
    {
        return $this->belongsTo(User::class, 'usu_origem', 'id');
    }

    public function userDestino()
    {
        return $this->belongsTo(User::class, 'usu_destino', 'id');
    }

}