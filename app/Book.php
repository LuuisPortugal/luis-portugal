<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'author_id', 'category_id', 'year', 'pages_length'
    ];

    public function category(){
        return $this->hasOne(\App\Category::class, 'id', 'category_id')->select(DB::raw('categories.name as category'))->get();
    }

    public function author(){
        return $this->hasOne(\App\Author::class, 'id', 'author_id')->select(DB::raw('authors.name as author'))->get();
    }
}
