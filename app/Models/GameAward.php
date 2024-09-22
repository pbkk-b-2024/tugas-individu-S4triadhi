<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameAward extends Model
{
    use HasFactory;

    protected $fillable = ['game_id', 'award_id', 'award_year'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function award()
    {
        return $this->belongsTo(Award::class);
    }
}
