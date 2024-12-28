<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGame extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'developer_id',
        'publisher_id',
        'esrb_rating_id',
        'genre_id',
        'console_id',
        'release_date',
    ];

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function esrbRating()
    {
        return $this->belongsTo(EsrbRating::class);
    }

    public function genre()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function console()
    {
        return $this->belongsTo(GameConsole::class);
    }
}
