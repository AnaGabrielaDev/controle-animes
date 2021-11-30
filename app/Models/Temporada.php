<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    public function episodios ()
    {
        return $this->hasMany(Episodios::class);
    }

    public function serie () 
    {
        return $this->belongsTo(Anime::class);
    }
}
