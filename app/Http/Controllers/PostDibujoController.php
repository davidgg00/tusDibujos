<?php

namespace App\Http\Controllers;

use App\Models\PostDibujo;
use App\Models\UsuarioLikes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostDibujoController extends Controller
{

    public function like($id)
    {
        PostDibujo::where('id', $id)->increment('valoracion');
        $usuarioLike = new UsuarioLikes;
        $usuarioLike->usuario_username = Auth::user()->username;
        $usuarioLike->post_id = $id;
        $usuarioLike->fecha = now();
        $usuarioLike->save();
    }

    public function quitarLike($id){
        PostDibujo::where('id', $id)->decrement('valoracion',1);
        UsuarioLikes::where('usuario_username', Auth::user()->username);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = UsuarioLikes::all()->where('usuario_username','davidgg00');
        print_r($usuarios);
        
        
        //print_r(UsuarioLikes::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostDibujo  $postDibujo
     * @return \Illuminate\Http\Response
     */
    public function show(PostDibujo $postDibujo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostDibujo  $postDibujo
     * @return \Illuminate\Http\Response
     */
    public function edit(PostDibujo $postDibujo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostDibujo  $postDibujo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostDibujo $postDibujo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostDibujo  $postDibujo
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostDibujo $postDibujo)
    {
        //
    }
}
