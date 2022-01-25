<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'original_id',
        'title'
    ];

    public function films(){

//       return $this->belongsToMany(Film::class)->withPivot('column1', 'column2');
        return $this->belongsToMany(Film::class, 'film_category', null, null, null, 'original_id');
    }
}
