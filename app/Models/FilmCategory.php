<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmCategory extends Model
{
    use HasFactory;
    /**
     * Get all of the posts that are assigned this tag.
     */
    protected $table = 'film_category';

    protected $fillable=[
        'film_id',
        'category_id'
    ];
}
