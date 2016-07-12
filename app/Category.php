<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function books(){
        return $this->belongsTo(\App\Book::class, 'category_id', 'id');
    }
}
