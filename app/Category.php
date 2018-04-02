<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function posts_cat(){
        return $this->hasMany('App\Post');
    }
}
