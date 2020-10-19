<?php

namespace App\Http\Controllers;

use App\Models\PostDibujo;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\PostDec;

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
        $posts = PostDibujo::all();
        
        return view('home',["posts"=>$posts]);
    }
}
