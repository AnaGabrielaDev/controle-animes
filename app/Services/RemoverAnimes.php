<?php 

namespace App\Services;

use App\Models\Anime;
use App\Models\Episodios;
use App\Models\Temporada;
use Illuminate\Support\Facades\DB;

class RemoverAnimes 
{
    public function removeAnimes (int $animeId) : string
    {
        $nomeAnime = '';
        DB::transaction(function () use ($animeId, &$nomeAnime) {
            $anime = Anime::find($animeId);
            $nomeAnime = $anime->nome;

            $this->removeTemporadas($anime);
            $anime->delete();
        });

        return $nomeAnime;
    }

    private function removeTemporadas(Anime $anime)
    {
        $anime->temporadas->each(function (Temporada $temporada) {
            $this->removeEpisodios($temporada);
            $temporada->delete();
        });
    } 

    public function removeEpisodios (Temporada $temporada): void
    {
        $temporada->episodios()->each(function (Episodios $episodios) {
            $episodios->delete();
        });
    }
}