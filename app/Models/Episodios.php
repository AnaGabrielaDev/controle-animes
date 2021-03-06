<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episodios extends Model
{
    public $timestamps = false;
    protected $fillable = ['numero'];

    public function temporada ()
    {
        return $this->BelongsTo(Temporada::class);
    }
}
