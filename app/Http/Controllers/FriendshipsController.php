<?php

namespace App\Http\Controllers;
use App\Notifications\NewFriendRequest;
use Auth;
use Illuminate\Http\Request;

class FriendshipsController extends Controller
{
  public function check($id) {
    $user = Auth::user();
    //if $user already requested
    if ($user->has_pending_friend_requests_sent_from($id)) {
      return ['status' => 'pending'];
    }
    //if I requested to user
    if ($user->has_pending_friend_requests_sent_to($id)) {
      return ['status' => 'waiting'];
    }
    //if we are friends
    if ($user->is_friends_with($id)) {
      return ['status' => 'friend'];
    }

      return ['status' => 0 ];
  }
  public function add_friend($id){
    $response = Auth::user()->add_friend($id);
    User::find($id)->notify(new NewFriendRequest(Auth::user()));
    return $response;
  }
  public function accept_friend($id){
    return Auth::user()->accept_friend($id);
  }
}
