<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
        use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function userprofile(){
        return $this->hasOne("App\Userprofile");
    }
    public function comment(){
        return $this->hasMany("App\Comment");
    }
    public function follower(){
        return $this->hasMany("App\Follower");
    }
    public function tweet(){
        return $this->hasMany("App\Tweet");
    }
    public function tweetlike(){
        return $this->hasMany("App\Tweetlike");
    }
}
