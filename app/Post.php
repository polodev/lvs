<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $with = ['user', 'likes'];
  protected $guarded = [];
  public function user(){
    return $this->belongsTo(User::class);
  }
  public function likes(){
    return $this->hasMany(Like::class);
  }
}
