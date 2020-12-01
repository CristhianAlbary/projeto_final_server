<?php

namespace App\Models\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail, Notifiable, HasApiTokens, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'login',
        'password',
        'status',
        'tipo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function messageFrom()
    {
        return $this->hasMany(Message::class, 'usu_origem', 'id');
    }

    public function messageTo()
    {
        return $this->hasMany(Message::class, 'usu_destino', 'id');
    }

    public function taskFrom()
    {
        return $this->hasMany(Task::class, 'usu_origem', 'id');
    }

    public function taskTo()
    {
        return $this->hasMany(Task::class, 'usu_destino', 'id');
    }

}
