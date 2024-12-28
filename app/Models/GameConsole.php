<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameConsole extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',              // Console name (e.g., PlayStation 5, Xbox Series X)
        'manufacturer',      // Manufacturer (e.g., Sony, Microsoft)
        'release_date',      // Release date
        'generation',        // Console generation
    ];

    public function videoGames()
    {
        return $this->hasMany(VideoGame::class);
    }
}
