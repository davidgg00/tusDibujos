@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($posts as $post)
        <div class="post col-md-7 border bg-white">
            <div class="cabeceraPost d-flex justify-content-between p-2">
                <span>Titulo del Post</span>
                <span>Publicado por {{$post->usuario_username}} el {{$post->fecha}}</span>
            </div>
            <div class="imagenPost mt-1">
                <img src="{{$post->img_url}}" alt="imagen del post" class="img-fluid fotoPost d-block mx-auto" />
            </div>
            <div class="wrapperLike text-center d-flex justify-content-around col-md-3 mx-auto m-2">
                <img src="{{ asset('images/like_0.svg') }}" class="likeImagen likeFalse"> <span class="num_like">0</span>
            </div>
        </div>
        @endforeach
        <div class="post col-md-7 border bg-white">
            <div class="cabeceraPost d-flex justify-content-between p-2">
                <span>Titulo del Post</span>
                <span>Publicado por usuario el 15 Oct 2020 16:37</span>
            </div>
            <div class="imagenPost mt-1">
                <img src="https://dibujoartistico.files.wordpress.com/2009/04/tecnicas-del-carboncillo.jpg?w=584" alt="imagen del post" class="img-fluid fotoPost d-block mx-auto" />
            </div>
            <div class="wrapperLike text-center d-flex justify-content-around col-md-3 mx-auto m-2">
                <img src="{{ asset('images/like_0.svg') }}" class="likeImagen likeFalse"> <span class="num_like">0</span>
            </div>
        </div>
    </div>
</div>
@endsection