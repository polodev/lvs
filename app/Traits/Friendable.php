<?php
namespace App\Traits;
use App\Friendship;

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
}

