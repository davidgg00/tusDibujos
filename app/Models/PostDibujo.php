<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostDibujo extends Model
{
    use HasFactory;

    protected $table = 'postdibujos';

    protected $primaryKey = "id";

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'titulo',
        'img_url',
        'fecha',
        'valoracion',
        'usuario_username'
    ];


    public function usuario()
    {
        return $this->hasOne('App\User', 'usuario', 'username');
    }

    public function comentarios()
    {
        return $this->hasMany('App\Comentarios', 'post', 'id');
    }

    public function usuariolikes()
    {
        return $this->hasMany('App\Models\UsuarioLikes', 'post_id', 'id');
    }
}
