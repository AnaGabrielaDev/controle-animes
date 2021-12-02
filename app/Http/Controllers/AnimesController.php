<?php 

namespace App\Http\Controllers;

use App\Http\Requests\AnimesFormRequest;
use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\Episodios;
use App\Models\Temporada;
use App\Services\CreatorAnimes;

class AnimesController extends Controller 
{
    public function index (Request $request) 
    {
        $animes = Anime::query()->orderBy('nome')->get();
        $message = $request->session()->get('message');

        return view('animes.index', compact('animes','message'));
    }

    public function create () 
    {
        return view('animes.create');
    }

    public function store (AnimesFormRequest $request, CreatorAnimes $creatorAnimes)
    {
        $nome = $request->get('nome');
        $temporadas = $request->get('temporadas');
        $episodios = $request->get('episodios');
        $request->session()->flash ('message',"{$nome} foi criando com sucesso");

        return redirect('/animes');

    }

    public function destroy (Request $request)
    {
        $anime = Anime::find($request->id);
        $nomeAnime = $anime->nome;
        $anime->temporadas->each(function (Temporada $temporada) {
            $temporada->episodios->each(function (Episodios $episodios){
                $episodios->delete();
            });
            $temporada->delete();
        });
        $anime->delete();

        $request->session()->flash ('message', "A exclusão do anime $nomeAnime foi executada com sucesso");
    
        return redirect('/animes');
    }
}