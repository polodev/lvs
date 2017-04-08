<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
  public function store(Request $request){
    return Post::create([
      'user_id' => auth()->id(),
      'content' => $request->content
    ]);
  }
}
