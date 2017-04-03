<?php
namespace App\Traits;
use App\Friendship;
use App\User;

/**
 * summary
 */
trait Friendable
{
    public function hello()
    {
      return 'hello world';
    }
    public function add_friend($user_requested_id){
      //if $requester_id is mine
      if($user_requested_id == $this->user_id) {
        return 0;
      }
      //if already requested to me
      if ($this->has_pending_friend_requests_sent_from($user_requested_id) == 1) {
        return $this->accept_friend($user_requested_id);
      }
      //if already i requested
      if ($this->has_pending_friend_requests_sent_to($user_requested_id) == 1) {
        return "already requested";
      }
      //if we are friends
      if($this->is_friends_with($user_requested_id)) {
        return "already friends"; 
      }
      $friendship = Friendship::create([
          'requester' => $this->id,
          'user_requested' => $user_requested_id
        ]);
      if($friendship){
        return 1;
      }
        return 0;
    }
    public function accept_friend($requester_id){
      if ($this->has_pending_friend_requests_sent_from($requester_id) == 0) {
        return 0;
      }
      $friendship = Friendship::where('requester', $requester_id)
                      ->where('user_requested', $this->id)->first();
      if ($friendship) {
        $friendship->update([
            'status' => 1
          ]);
        return 1;
      }
      return response()->json('fail', 501);
    }
    public function friends(){
      $friends = [];
      $f1 = Friendship::where('status', 1)->where('requester', $this->id)->get();
      foreach ($f1 as $friendship) {
        array_push($friends, User::find($friendship->user_requested));
      }
      $f2 = Friendship::where('status', 1)->where('user_requested', $this->id)->get();
      foreach ($f2 as $friendship) {
        array_push($friends, User::find($friendship->requester));
      }
      return $friends;
    }
    public function pending_friend_requests(){
      $users = [];
      $f1 = Friendship::where('status', 0)->where('user_requested', $this->id)->get();
      foreach ($f1 as $friendship) {
        array_push($users, User::find($friendship->requester));
      }
      return $users;
    }
    public function friends_id(){
      return collect($this->friends())->pluck('id');
    }
    public function is_friends_with($user_id){
      if(in_array($user_id, $this->friends_id()->toArray())) {
        return 1;
      }
        return 0;
    }

    public function pending_friend_requests_id(){
      return collect($this->pending_friend_requests())->pluck('id');
    }
    public function pending_friend_requests_sent(){
      $users = [];
      $f1 = Friendship::where('status', 0)
      ->where('requester', $this->id)->get();
      foreach ($f1 as $friendship) {
        array_push($users, User::find($friendship->user_requested));
      }
      return $users;
    }
    public function pending_friend_requests_sent_id(){
      return collect($this->pending_friend_requests_sent())->pluck('id');
    }
    public function has_pending_friend_requests_sent_from($user_id){
      if( in_array($user_id, $this->pending_friend_requests_id()->toArray()) ) {
        return 1;
      }
        return 0;
    }
    public function has_pending_friend_requests_sent_to($user_id){
      if( in_array($user_id, $this->pending_friend_requests_sent_id()->toArray()) ) {
        return 1;
      }
        return 0;
    }
}

