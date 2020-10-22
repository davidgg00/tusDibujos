@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center ">
        @if (Session::has('mensaje'))
        <div class="alert alert-success col-md-7 mx-auto mb-0 text-center" role="alert">
            ¡Has subido correctamente el dibujo!
        </div>
        @endif
       
        <div class="wrapper-form col-md-7 border bg-white p-3">
            <form class="p-3" method="POST" action="{{route('subidaDibujo')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="titulo">Titulo del post</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Escriba el titulo del post...">
                </div>
                <div class="custom-file">
                    <!--  <input type="file" class="custom-file-input" id="inputFichero" name="dibujo">
                    <label class="custom-file-label" for="customFile">Subir imagen del dibujo</label> -->
                    <label for="titulo">Selecciona la imagen de tu dibujo</label>
                    <input type="file" class="form-control" name="dibujo" id="inputFichero">
                </div>
                <button type="submit" class="btn btn-primary mt-4">Subir Imagen</button>
            </form>
        </div>
    </div>
</div>
@endsection