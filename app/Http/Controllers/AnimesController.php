<?php 

namespace App\Http\Controllers;

use App\Http\Requests\AnimesFormRequest;
use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\Episodios;
use App\Models\Temporada;
use App\Services\CreatorAnimes;
use App\Services\RemoverAnimes;

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

        try {
            $creatorAnimes->execute($nome, $temporadas, $episodios);
        }catch (\Exception $error) {
            return redirect('animes')
                ->with('status', false)
                ->with('message', 'Erro ao cadastrar o Anime');
        }

        return redirect('animes')
            ->with('status', true)
            ->with('message', 'Anime cadastrado com sucesso');
        //$request->session()->flash ('message',"{$nome} foi criando com sucesso");

       // return redirect('/animes');

    }

    public function destroy (Request $request, RemoverAnimes $removerAnimes)
    {
        $nomeAnime = $removerAnimes->removeAnimes($request->id);
        $request->session()->flash ('message', "A exclusão do anime $nomeAnime foi executada com sucesso");
    
        return redirect('/animes');
    }
}