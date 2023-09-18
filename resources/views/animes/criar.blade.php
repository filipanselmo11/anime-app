@extends('layouts.main')
@section('page-title', 'Cadastrar Anime')
@section('content')
<div id="anime-create-container" class="col-md-6 offset-md-3">
    <h1>
        Cadastre o Anime
    </h1>
    <form action="/animes" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Imagem:</label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="titulo">Anime:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Título do Anime" class="form-control">
        </div>
        <div class="form-group">
            <label for="genero">Gênero:</label>
            <input type="text" id="genero" name="genero" placeholder="Gênero do Anime" class="form-control">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" cols="30" placeholder="Descrição do Anime" rows="10" class="form-control"></textarea>
        </div>
        <br/>
        <input type="submit" class="btn btn-primary" value="Cadastrar Anime">
    </form>
</div>
@endsection
