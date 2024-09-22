<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameConsole extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'manufacturer',
        'release_year',
        'generation',
        'discontinued_date',
        'description'
    ];

    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_platforms', 'console_id', 'game_id');
    }

    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }
}
