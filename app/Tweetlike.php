<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweetlike extends Model
{
    public $table = "Tweetslikes";

    public function user(){
        return $this->hasOne("App\User");
    }
    public function tweet(){
        return $this->belongsTo("App\Tweet");
    }
}
