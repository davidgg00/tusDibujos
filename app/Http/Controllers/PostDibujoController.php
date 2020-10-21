<?php

namespace App\Http\Controllers;

use App\Models\PostDibujo;
use App\Models\UsuarioLikes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


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

    public function quitarLike($id)
    {
        PostDibujo::where('id', $id)->decrement('valoracion', 1);
        UsuarioLikes::where('usuario_username', Auth::user()->username)->where('post_id', $id)->delete();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = UsuarioLikes::all()->where('usuario_username', 'davidgg00');
        print_r($usuarios);


        //print_r(UsuarioLikes::all());
    }


    public function subirDibujo(Request $request)
    {
        if ($request->hasFile('dibujo')) {
            //  Let's do everything here
            if ($request->file('dibujo')->isValid()) {
                //
                $validated = $request->validate([
                    'titulo' => 'string|max:25',
                    'dibujo' => 'mimes:jpeg,png|max:1014',
                ]);
                $extension = $request->dibujo->getClientOriginalExtension();
                $request->dibujo->storeAs('/public', time() . "." . $extension);
                $url = Storage::url(time() . "." . $extension);
                $dibujo = PostDibujo::create([
                    'titulo' => $validated['titulo'],
                    'img_url' => $url,
                    'fecha' => date('Y-m-d'),
                    'valoracion' => '0',
                    'usuario_username' => Auth::user()->username
                ]);
            }
        }
        return redirect("/");
    }
}
