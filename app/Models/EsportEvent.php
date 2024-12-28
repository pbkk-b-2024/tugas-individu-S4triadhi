<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EsportEvent extends Model
{
    use HasFactory;

    // Specify the fillable attributes
    protected $fillable = [
        'name',
        'event_date',
        'location',
        'prize_pool',
        'description',
    ];


}
