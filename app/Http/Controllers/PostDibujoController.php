<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
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
    public function index($id)
    {
        $likes = "";
        if (Auth::user()) {
            $likes = UsuarioLikes::all()->where('usuario_username', Auth::user()->username);
        } else {
            $likes = array();
        }

        $post = PostDibujo::where('id', $id)->first();
        $comentarios = Comentario::where('post_id', $id)->get();
        return view('post', ["post" => $post, "likes" => $likes, "id" => $id, "comentarios" => $comentarios]);
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
                    'fecha' => now(),
                    'valoracion' => '0',
                    'usuario_username' => Auth::user()->username
                ]);
            }
        }
        return redirect()->back()->with('mensaje', 'Has subido correctamente el dibujo!');;
    }

    public function comentar(Request $request)
    {
        $validated = $request->validate([
            'textoComentario' => 'string|max:25',
        ]);

        $comentario = new Comentario;
        $comentario->usuario_username = Auth::user()->username;
        $comentario->fecha = now();
        $comentario->mensaje = $request->textoComentario;
        $comentario->post_id = $request->idPost;
        if ($request->idPostRespuesta) {
            $comentario->comentario_id = $request->idPostRespuesta;
        }
        $comentario->save();
        return redirect()->back()->with('mensaje', '¡Comentario Subido Correctamente!');;
    }

    public function mejoresDibujos()
    {
        $likes = "";
        if (Auth::user()) {
            $likes = UsuarioLikes::all()->where('usuario_username', Auth::user()->username);
        } else {
            $likes = array();
        }


        $posts = PostDibujo::orderBy('valoracion', 'DESC')->paginate(2);

        return view('home', ["posts" => $posts, "likes" => $likes]);
    }

    public function randomDibujos()
    {
        $likes = "";
        if (Auth::user()) {
            $likes = UsuarioLikes::all()->where('usuario_username', Auth::user()->username);
        } else {
            $likes = array();
        }


        $posts = PostDibujo::inRandomOrder()->paginate(2);

        return view('home', ["posts" => $posts, "likes" => $likes]);
    }
}
