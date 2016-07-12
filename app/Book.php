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
        return $this->hasOne(\App\Category::class, 'id', 'category_id');
    }

    public function author(){
        return $this->hasOne(\App\Author::class, 'id', 'author_id');
    }
}
