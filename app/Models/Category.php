<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_categories', 'category_id', 'game_id');
    }

    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }
}
