<?php

namespace App;
use App\Traits\Friendable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
class User extends Authenticatable
{
    use Notifiable;
    use Friendable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'gender', 'slug'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getAvatarAttribute($avatar){
      return asset(Storage::url($avatar));
    }
    public function profile() {
        return $this->hasOne(Profile::class);
    }
    public function posts(){
      return $this->hasMany(Post::class);
    }
}
