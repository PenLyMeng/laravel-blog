<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //


    protected $fillable = [
      'user_id','avatar','youtube','facebook','about'
    ];

    public function profile(){
        return $this->belongsTo('App\User');
    }

    public function getAvatarAttribute($avatar){
        return asset($avatar);
    }
}
