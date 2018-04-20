<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    protected $table = 'estimates';
    protected $primaryKey = 'extimateId';
    protected $fillable = [
        'bookId',
        'bookName',
        'chapterName',
        'userName',
        'estimateContent'
    ];
    public $timestamps = true;
    //

    public function book() {
        return $this->belongsTo('App\Models\Book','bookId','bookId');
    }
}
