<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function videoGames()
    {
        return $this->belongsToMany(VideoGame::class);
    }
}
