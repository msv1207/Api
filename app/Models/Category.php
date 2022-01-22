<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'original_category_id',
        'title'
    ];
    protected $table = 'category';
    public function films(){
        return  $this->belongsToMany(Film::class, 'film_category');
    }
}
