<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_id',
        'adult',
        'title',
        'original_title',
        'description',
        'release_date',
        'poster_path',
        'language',
        'popularity',
        'vote_average',
        'budget'
    ];

    public function categories(){
        return  ($this->belongsToMany(Category::class, "film_category", null, null, "original_id", "original_id"));
    }
}
