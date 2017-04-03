<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class FriendshipsController extends Controller
{
  public function check($id){
    $user = Auth::user();
    //if $user already requested
    if ($user->has_pending_friend_requests_sent_from($id)) {
      return [
        'status' => 'pending'
      ];
    }
    //if I requested to user
    if ($user->has_pending_friend_requests_sent_to($id)) {
      return [
        'status' => 'waiting'
      ];
    }
    //if we are friends
    if ($user->is_friends_with($id)) {
      return [
        'status' => 'friend'
      ];
    }

    //other wise add friend
      return [
        'status' => 0
      ];
  }
}
