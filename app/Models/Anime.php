<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    public $timestamps = false; 
    protected $fillable = ['nome'];
}