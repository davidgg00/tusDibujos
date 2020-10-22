<?php

namespace App\Http\Controllers;

use App\Models\PostDibujo;
use App\Models\UsuarioLikes;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

   
    public function index()
    {
        $likes = "";
        if (Auth::user()) {
            $likes = UsuarioLikes::all()->where('usuario_username', Auth::user()->username);
        } else {
            $likes = array();
        }


        $posts = PostDibujo::orderBy('fecha','DESC')->paginate(2);

        return view('home', ["posts" => $posts, "likes" => $likes]);
    }
}
