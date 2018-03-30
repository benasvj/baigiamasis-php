<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
   }

    public function cat(){
        return $this->belongsTo('App\Category');
    }   

    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }   
}
