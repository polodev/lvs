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
    return $feed;
  }
}
