<?php

namespace App\Http\Controllers;

use App\Models\PostDibujo;
use App\Models\UsuarioLikes;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $likes = "";
        if (Auth::user()) {
            $likes = UsuarioLikes::all()->where('usuario_username',Auth::user()->username);
        } else {
            $likes = array();
        }
        $posts = PostDibujo::all();
        
        return view('home',["posts"=>$posts, "likes"=>$likes]);
    }
}
