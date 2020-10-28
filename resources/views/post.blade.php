@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <?php $likedado = false ?>


        <div class="post col-md-12 bg-white mb-0" id="{{$post->id}}">
            <div class="cabeceraPost d-flex justify-content-between p-2 flex-wrap">
                <span class="col-12 col-md-4">{{$post->titulo}}</span>
                <span class="col-12 col-md-6">Publicado por {{$post->usuario_username}} el {{$post->fecha}}</span>
            </div>
            <div class="imagenPost mt-1">
                <img src="{{$post->img_url}}" alt="imagen del post" class="img-fluid fotoPostUnico d-block mx-auto" />
            </div>
            <div class="wrapperLike text-center d-flex justify-content-around col-md-3 mx-auto m-2">
                <!-- Si no tiene sesión iniciada, no se permite que de like o no ha dado nunca like -->
                @if(!Auth::check() )
                <img src="{{ asset('images/like_0.svg') }}" class="likeImagen noLike" id="{{$post->id}}"> <span class="num_like">{{$post->valoracion}}</span>
                <input type="hidden" name="_token" id="{{$post->id}}" value="{{csrf_token()}}"></input>
                @endif

                <!--Si tiene sesión pero nunca ha dado like a alguna publicación-->
                @if(Auth::check() && count($likes) == 0)
                <img src="{{ asset('images/like_0.svg') }}" class="likeImagen likeFalse" id="{{$post->id}}"> <span class="num_like">{{$post->valoracion}}</span>
                <input type="hidden" name="_token" id="{{$post->id}}" value="{{csrf_token()}}"></input>
                @endif
                @foreach ($likes as $like)
                <!-- Si de todos los likes que ha dado ninguno es a esa publicación -->
                @if ($post->id != $like->post_id)
                <img src="{{ asset('images/like_0.svg') }}" class="likeImagen likeFalse" id="{{$post->id}}"> <span class="num_like">{{$post->valoracion}}</span>
                <input type="hidden" name="_token" id="{{$post->id}}" value="{{csrf_token()}}"></input>
                @else
                <img src="{{ asset('images/like_1.svg') }}" class="likeImagen likeTrue" id="{{$post->id}}"> <span class="num_like">{{$post->valoracion}}</span>
                <input type="hidden" name="_token" id="{{$post->id}}" value="{{csrf_token()}}"></input>
                @endif
                @endforeach
            </div>
        </div>

        <div class="comentarios col-md-12 bg-white border">
            <h3 class="display-4 text-center">COMENTARIOS</h3>
            @foreach ($comentarios as $comentario)
            @if (!$comentario->comentario_id)
            <div class="comentario border d-flex flex-wrap" data-idtextocomentario="<?= $comentario->id ?>">
                <div class="imagenUsuario border col-md-2">
                    <img src="{{ asset('images/userlogo.png') }}" class="userImage" alt="">
                    <p class="col-md-12 text-center mb-0 username"><?= $comentario->usuario_username ?></p>
                </div>
                <div class="textoComentario border d-flex flex-wrap align-items-center col-md-10">
                    <p class="col-md-12"><?= $comentario->mensaje ?></p>
                    <span class="col-md-12 text-right responder" data-idComentario="<?= $comentario->id ?>">Responder</span>
                </div>
                @foreach ($comentarios as $subcomentario)
                @if($comentario->id == $subcomentario->comentario_id)
                <div class="subcomentario border d-flex justify-content-end col-md-12 p-0">
                    <div class="imagenUsuario border col-md-2">
                        <img src="{{ asset('images/userlogo.png') }}" class="userImage" alt="">
                        <p class="col-md-12 text-center mb-0"><?= $subcomentario->usuario_username ?></p>
                    </div>
                    <div class="textoComentario border d-flex flex-wrap align-items-center col-md-9">
                        <p class="col-md-12"><?= $subcomentario->mensaje ?></p>
                        <span class="col-md-12 text-right responder" data-idComentario="<?= $id ?>">Responder</span>
                    </div>
                </div>
                @endif
                @endforeach

            </div>
            @endif
            @endforeach

            <div class="wrapperForm">
                <form method="POST" action="{{ route('comentar') }}">
                    @csrf
                    <div class="form-group col-md-8 mx-auto">
                        <label for="comentario" id="labelComentario">Escriba su comentario</label>
                        <textarea class="form-control" id="escribeComentario" name="textoComentario" rows="3"></textarea>
                        <input type="hidden" name="idPost" value='<?= $id ?>'>
                        <input type="hidden" name="idPostRespuesta" id="idPostRespuesta" value="">
                        @if(Auth::check() )
                        <button class="btn btn-primary mt-1" id="enviarComentario">Enviar</button>
                        @else
                        <button class="btn btn-primary mt-1" id="enviarComentario" disabled>Enviar</button>
                        @endif
                    </div>

                </form>
            </div>
        </div>


    </div>

</div>
@endsection