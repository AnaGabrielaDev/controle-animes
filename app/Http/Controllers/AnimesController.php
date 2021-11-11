<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}