<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = true;
    protected $table = 'books';
    protected $primaryKey = 'bookId';
    //允许赋值
    protected $fillable = [
        'title',
        'bookIntroduction',
        'cover',
        'authorName',
        'authorId',
        'audit'
    ];
    /**
     *
     * 绑定
     */
    public function author() {
        return $this->belongsTo('App\Models\User','authorId','id')->withDefault([
            'name' => 'NoName'
        ]);
    }

    public function bookList() {
        return $this->belongsTo('App\Models\BookList','bookId','bookId');
    }

    public function content() {
        return $this->hasMany('App\Models\BookContent','bookId','bookId');
    }
    public function type() {
        return $this->hasOne('App\Models\Type','typeId','typeId');
    }
    public function estimate() {
        return $this->hasMany('App\Models\Estimate','bookId','bookId');
    }

}
