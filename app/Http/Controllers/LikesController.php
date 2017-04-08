<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikesController extends Controller
{
  public function like($post_id){
    return Like::create([
      'user_id' => auth()->id(),
      'post_id' => $post_id
    ]);
  }
  public function unlike($post_id){
    return Like::where('user_id', auth()->id())
    ->where('post_id', $post_id)
    ->first()
    ->delete();
  }
}
