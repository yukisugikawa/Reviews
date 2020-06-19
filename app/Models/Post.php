<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\Like;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'summary', 'user_id'];

    /**
     * 投稿のいいねを取得
     */
    public function comments()
    {
      return $this->hasMany('App\Models\Comment');
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    /**
     * 投稿のいいねを取得
     */
    public function likes()
    {
      return $this->hasMany('App\Models\Like');
    }

    public function like_by()
    {
      return Like::where('user_id', Auth::user()->id)->first();
    }
}
