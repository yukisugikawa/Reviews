<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use kanazaca\CounterCache\CounterCache;

class Like extends Model
{
    use CounterCache;

    public $counterCacheOptions = [
        'Post' => [
            'field' => 'likes_count',
            'foreignKey' => 'post_id'
        ]
    ];

    protected $fillable = ['user_id', 'post_id'];

    /**
     * このいいねを所有するPostを取得
     */
    public function Post()
    {
      return $this->belongsTo('App\Models\Post');
    }

    //リレーションを定義しているLikeテーブル->Userテーブルにアクセスしている
    public function User()
    {
      return $this->belongsTo(User::class);
    }
}
