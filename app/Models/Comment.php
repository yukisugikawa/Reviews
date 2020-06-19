<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * このコメントを所有するreviewを取得
     */
    public function post()
    {
        return $this->belongsTo('App\Models\post');
    }
}
