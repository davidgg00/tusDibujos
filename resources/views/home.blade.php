@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <?php $likedado = false ?>
        @foreach ($posts as $post)

        <div class="post col-md-7 border bg-white" id="{{$post->id}}">
            <div class="cabeceraPost d-flex justify-content-between p-2">
                <span>{{$post->titulo}}</span>
                <span>Publicado por {{$post->usuario_username}} el {{$post->fecha}}</span>
            </div>
            <div class="imagenPost mt-1">
                <img src="{{$post->img_url}}" alt="imagen del post" class="img-fluid fotoPost d-block mx-auto" />
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
        @endforeach
        
        <div class="paginacion col-md-12 text-center d-flex justify-content-center">
        {{$posts->links("pagination::bootstrap-4")}}
        </div>
    </div>
   
</div>
@endsection