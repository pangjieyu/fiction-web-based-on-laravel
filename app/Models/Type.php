<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';
    protected $primaryKey = 'typeId';
    protected $guarded = [];
    public $timestamps = true;
    //

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * 绑定
     */

    public function book() {
        return $this->belongsTo('App\Models\Type','typeId','typeId');
    }
}
