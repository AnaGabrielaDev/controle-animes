<?php 

namespace App\Http\Controllers;

use App\Http\Requests\AnimesFormRequest;
use Illuminate\Http\Request;
use App\Models\Anime;

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

    public function store (AnimesFormRequest $request)
    {
        $anime = Anime::create($request->all());
        $request->session()->flash ('message',"{$anime->nome}, {$anime->id} foi criando com sucesso");

        return redirect('/animes');

    }

    public function destroy (Request $request)
    {
        Anime::destroy($request->id);
        $request->session()->flash ('message', "exclusão executada com sucesso");
    
        return redirect('/animes');
    }
}