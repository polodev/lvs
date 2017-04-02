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
    public function add_friend($requester_id){
      $friendship = Friendship::create([
          'requester' => $requester_id,
          'user_requested' => $this->id
        ]);
      if($friendship){
        return response()->json($friendship, 200);
      }
        return response()->json('fail', 501);
    }
    public function accept_friend($requester_id){
      $friendship = Friendship::where('requester', $requester_id)
                      ->where('user_requested', $this->id)->first();
      if ($friendship) {
        $friendship->update([
            'status' => 1
          ]);
        return response()->json($friendship, 200);
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
        return response()->json('friend', 200);
      }
        return response()->json('fail', 501);
    }
}

