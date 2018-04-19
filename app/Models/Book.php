<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //允许赋值
    protected $fillable = [
        'title',
        'bookIntroduction',
        'cover',
        'authorName',
        'authorId',
        'audit'
    ];
}
