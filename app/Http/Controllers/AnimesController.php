<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anime;

class AnimesController extends Controller 
{
    public function index (Request $request) 
    {
        $animes = [
            'Akame ga kill',
            'death note',
            'to aru majutsu no index'
        ];

        return view('animes.index', compact(var_name:'animes'));
    }

    public function create () 
    {
        return view('animes.create');
    }

    public function store (Request $request)
    {
        $nome = $request -> nome;
        $anime = new Anime();
        $anime -> nome = $nome;
        var_dump($anime->save());


    }
}