<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table = 'usuarios';

    protected $primaryKey = "username";

    public $timestamps = false;

    public $incrementing = false;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'apenom',
        'password',
        'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function comentario()
    {
        return $this->hasMany('App\Models\Comentario', 'usuario', 'username');
    }

    public function postdibujo()
    {
        return $this->hasMany('App\Models\PostDibujo', 'usuario', 'username');
    }
}
