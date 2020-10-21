@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
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
                    <input type="file" name="dibujo" id="inputFichero">
                </div>
                <button type="submit" class="btn btn-primary mt-2">Subir Imagen</button>
            </form>
        </div>
    </div>
</div>
@endsection