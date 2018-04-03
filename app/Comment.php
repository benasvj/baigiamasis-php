<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body', 'user_id'];
    
    public function commentable(){
        return $this->morphTo();
    }   

    public function user(){
        return $this->belongsTo('App\User');
   }

    //kad komentuotume į komentarą (reply)
    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }   

    public function likes(){
        return $this->hasMany('App\Like');
    }

    public function dislikes(){
        return $this->hasMany('App\Dislike');
    }
}
