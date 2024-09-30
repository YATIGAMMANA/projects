<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewMore extends Model
{
    use HasFactory;

    protected $table = 'secondimages';

    protected $fillable = [
        'title',
        'description',
        'places',
        'activities',
        'hotels',
        'restaurants',
    ];
}
