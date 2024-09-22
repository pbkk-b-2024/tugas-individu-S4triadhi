<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'release_date', 'description', 'rating', 'developer_id', 'publisher_id'];

    protected $casts = [
        'release_date' => 'date',
    ];

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function gameConsole()
    {
        return $this->belongsToMany(GameConsole::class, 'game_platforms', 'game_id', 'console_id');
    }    

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'game_categories', 'game_id', 'category_id');
    }

    public function gameAwards()
    {
        return $this->hasMany(GameAward::class);
    }

    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }
}
