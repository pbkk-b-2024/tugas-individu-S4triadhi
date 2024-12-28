<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameCreator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bio',
        'video_game_id',
    ];

    // Define the relationship with VideoGame
    public function videoGame()
    {
        return $this->belongsTo(VideoGame::class);
    }
}
