<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ESRBrating extends Model
{
    use HasFactory;

    protected $table = 'esrb_ratings';

    // Specify the fillable attributes for mass assignment
    protected $fillable = [
        'rating',
        'description'
    ];

    public function videoGames()
    {
        return $this->hasMany(VideoGame::class);
    }
}
