<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userprofile extends Model
{
    protected $fillable = ['user_id', 'age', 'gender', 'address', 'location', 'phone', 'image_url'];

    public function user(){
        return $this->belongsTo("App\User");
    }
}
