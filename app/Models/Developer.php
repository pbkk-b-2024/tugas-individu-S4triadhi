<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'founded_year',
        'headquarters',
        'website',
    ];

    public function videoGames()
    {
        return $this->hasMany(VideoGame::class);
    }
}
