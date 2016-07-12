<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function books(){
        return $this->belongsTo(\App\Book::class, 'author_id', 'id');

    }
}
