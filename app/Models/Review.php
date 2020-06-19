<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * reviewのコメントを取得
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
