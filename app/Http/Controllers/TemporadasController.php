<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function index (int $animeId)
    {
        $anime = Anime::find($animeId);
        $temporadas = $anime->temporadas;

        return view('temporadas.index', compact('anime','temporadas'));
    }
}
