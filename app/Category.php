<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //relations
    public function posts():object {
        return $this->hasMany(Post::class,'id');
    }
}
