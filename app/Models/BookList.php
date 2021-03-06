<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookList extends Model
{
    protected $table = 'book_lists';
    protected $primaryKey = 'id';

    protected $guarded = [
        'id'
    ];

    public $timestamps = true;
    //



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * 绑定
     */
    public function book() {
        return $this->hasOne('App\Models\Book','bookId','bookId');
    }
    public function user() {
        return $this->belongsTo('App\Models\User','userId','id');
    }
    public function chapterName() {
        return $this->book->content->where('chapterId','=',$this->lastReadChapterId)->first()->chapterName;
    }
}
