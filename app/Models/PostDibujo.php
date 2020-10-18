<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostDibujo extends Model
{
    use HasFactory;

    protected $table = 'postdibujos';

    protected $primaryKey = "username";

    public $timestamps = false;

    public $incrementing = false;

    public function usuario()
    {
        return $this->hasOne('App\User', 'usuario', 'username');
    }

    public function comentarios()
    {
        return $this->hasMany('App\Comentarios', 'post', 'id');
    }
}
