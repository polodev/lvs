<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedsController extends Controller
{
  public function index(){
    $friends = Auth::user()->friends();
    $feed = [];
    forEach($friends as $friend) {
      forEach($friend->posts as $post) {
        array_push($feed, $post);
      }
    }
    forEach(auth()->user()->posts as $post) {
      array_push($feed, $post);
    }
    usort($feed, function ($p1, $p2) {
      return $p1->id < $p2->id;
    });
    return $feed;
  }
}
