<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livros extends Model
{
    protected $fillable = [
        'isbn', 'title', 'cover', 'author', 'level', 'discipline', 'price'
    ];

    protected $hidden = [];
}
