<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookContent extends Model
{
    protected $table = 'book_contents';
    protected $primaryKey = 'chapterId';
    protected $fillable = [
        'chapterName',
        'bookId',
        'chapterContent',
        'lastAlterTime',

    ];
    public $timestamps = true;
    //

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * 绑定
     */
    public function book() {
        return $this->belongsTo('App\Models\Book','bookId','bookId');
    }
}
