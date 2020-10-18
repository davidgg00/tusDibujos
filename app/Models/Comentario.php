<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{

    protected $table = 'comentarios';

    protected $primaryKey = "id";

    public $timestamps = false;

    public $incrementing = false;

    public function usuario()
    {
        return $this->hasMany('App\User', 'usuario', 'username');
    }
}
