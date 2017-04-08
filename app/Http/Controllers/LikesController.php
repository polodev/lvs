<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;

class LikesController extends Controller
{
  public function like($post_id){
    $like = Like::create([
      'user_id' => auth()->id(),
      'post_id' => $post_id
    ]);
    //for eagar loading I have to return that way
    return Like::find($like->id);
  }
  public function unlike($post_id){
    $like = Like::where('user_id', auth()->id())
    ->where('post_id', $post_id)
    ->first();
    $like->delete();
    return $like->id;
  }
}
