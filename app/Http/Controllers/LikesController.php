<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Like;
use Auth;
use App\Models\Post;

class LikesController extends Controller
{
    public function store(Request $request, $post_id)
    {
        Like::create(
          array(
            'user_id' => Auth::user()->id,
            'post_id' => $post_id
          )
        );

        $post = Post::findOrFail($post_id);

        return redirect()
             ->action('PostsController@show', $post->id);
    }

    public function destroy($post_id, $like_id)
    {
      $post = Post::findOrFail($post_id);
    //   likesテーブルのなかのuser_idが現在ログインしているidのものを取得
      $post->like_by()->findOrFail($like_id)->delete();

    //   コントローラアクションへのリダイレクト
      return redirect()
             ->action('PostsController@show', $post->id);
    }
}
