<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GamePlatform extends Model
{
    use HasFactory;

    protected $fillable = ['game_id', 'console_id'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function gameConsole()
    {
        return $this->belongsTo(GameConsole::class);
    }
}
