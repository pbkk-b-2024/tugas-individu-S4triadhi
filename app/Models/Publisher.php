<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    // Specify the fillable attributes for mass assignment
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
