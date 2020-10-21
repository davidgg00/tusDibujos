<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioLikes extends Model
{
    use HasFactory;

    protected $table = 'usuarioslikes';

    protected $primaryKey = "usuario_username";

    public $timestamps = false;

    public $incrementing = false;

    public function usuario()
    {
        return $this->hasOne('App\Models\User', 'usuario', 'username');
    }

    public function postdibujo()
    {
        return $this->hasOne('App\Models\PostDibujo', 'usuario_username', 'usuario_username');
    }
}
