<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmCategory extends Model
{
    protected $table = 'film_category';



    use HasFactory;
    /**
     * Get all of the posts that are assigned this tag.
     */
    protected $fillable=['film_id', 'category_id'];
//    public function index()
//    {
//        return $this->belongsToMany(FilmCategory::class, 'film_categories', 'film_id', 'category_id');
//    }




//
//    /**
//     * Get all of the videos that are assigned this tag.
//     */
//    public function categories()
//    {
//        return $this->morphedByMany(Category::class, 'category', 'categories', 'category_id');
//    }

//    public function category() {
//        return $this->hasManyThrough(Film::class, Category::class, 'parent_id', 'category_id', 'id');
//    }

}
