<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;

class AnimesController extends Controller 
{
    public function index () 
    {
        $animes = Anime::all();

        return view('animes.index', compact('animes'));
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