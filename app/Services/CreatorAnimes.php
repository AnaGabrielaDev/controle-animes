<?php 

namespace App\Services;

use App\Models\Anime;

class CreatorAnimes
{
    public function createAnime(string $nome, int $temporadas, int $episodios) : Anime
    {
        $anime = Anime::create(['nome' => $nome]);
        for ($i = 0; $i <= $temporadas; $i++) {
            $temporadas = $anime->temporadas()->create(['numero' => $i]);


            for ($j = 1; $j <= $episodios; $j++) {
                $temporadas->episodios()->create(['numero' => $j]);
            }
        }
        return $anime;

    }
}