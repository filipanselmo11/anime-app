@extends('layouts.main')

@section('title', 'Anime App')
@section('page-title', 'Anime App')
@section('content')

<div id="search-container" class="col-md-12">
    <h1>
        Buscar Anime
    </h1>
    <br/>
    <form action="/" method="GET">
        <input type="text" id="search" class="form-control" placeholder="Procurar">
    </form>
</div>

<div id="animes-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>
        Outros Animes
    </h2>
    @endif
    <div id="cards-container" class="row">
        @foreach($animes as $anime)
        <div class="card col-md-3">
            <img src="/img/animes/{{ $anime->image}}" alt="{{ $anime->titulo }}">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $anime->titulo }}
                </h5>
                <p class="card-subtitle">
                    {{ $anime->genero }}
                </p>
                <br/>
                <a href="/animes/{{ $anime->id}}" class="btn btn-primary">
                    Saber mais
                </a>
            </div>
        </div>
        @endforeach
        @if(count($animes) == 0 && $search)
            <p>
                Não foi possível encontrar o anime
                <a href="/">Ver todos</a>
            </p>
        @elseif(count($animes) == 0)
        <p>
            Não há animes disponíveis
        </p>
        @endif
    </div>
</div>

@endsection
