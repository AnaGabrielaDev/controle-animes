<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;

class AnimesController extends Controller 
{
    public function index () 
    {
        $animes = Anime::query()->orderBy('nome')->get();

        return view('animes.index', compact('animes'));
    }

    public function create () 
    {
        return view('animes.create');
    }

    public function store (Request $request)
    {
        $anime = Anime::create($request->all());

        return redirect('/animes');

    }
}