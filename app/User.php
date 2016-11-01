<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // El usuario tiene muchos posts
    public function posts()
    {
        return $this->hasMany('App\Post','autor');
    }

    // El usuario tiene un perfil personal
    public function datos_usuario()
    {
        return $this->hasOne('App\DatosUsuario','usuario');
    }

    // El usuario tiene muchos logros
    public function logros()
    {
        return $this->hasMany('App\Posts','author_id');
    }
}
