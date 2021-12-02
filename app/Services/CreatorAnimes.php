<?php 

namespace App\Services;

use App\Models\Anime;
use Illuminate\Support\Facades\DB;

class CreatorAnimes
{
    private function createAnime(string $nome)
    {
        return Anime::create(['nome' => $nome]);
    }

    private function createTemporada (Anime $anime, int $temporadas, int $episodios)
    {
        for ($i = 1; $i <= $temporadas; $i++){
            $temporada = $anime->temporadas()->create([
                'numero'=>$i
            ]);

            $this->createEpisodio($temporada, $episodios);
        }
    }

    private function createEpisodio ($temporada, int $episodios)
    {
        for ($j = 1; $j <= $episodios; $j++){
            $temporada->episodios()->create([
                'numero'=>$j
            ]);
        }
    }

    public function execute (string $nome, int $temporada, int $episodios): Anime
    {
        DB::beginTransaction();

        $anime = $this->createAnime($nome);
        $this->createTemporada($anime, $temporada, $episodios);

        DB::commit();

        return $anime;
    }

}