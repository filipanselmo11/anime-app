<?php

namespace App\Http\Controllers;

use App\Models\Anime;

use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function index() {
        $search = request('search');
        if ($search) {
            $animes = Anime::where([
                ['titulo', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $animes = Anime::all();
        }

        return view('welcome', ['animes' => $animes, 'search' => $search]);
    }

    public function criar() {
        return view('animes.criar');
    }

    public function store(Request $request) {
        $anime = new Anime;
        $anime->titulo = $request->titulo;
        $anime->genero = $request->genero;
        $anime->descricao = $request->descricao;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;
            $requestImage->move(public_path('img/animes'), $imageName);
            $anime->image = $imageName;
        }

        $anime->save();

        return redirect('/')->with('msg', 'Anime Cadastrado com sucesso !');

    }
}
