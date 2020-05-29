<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function user():object {
        return $this->belongsTo(User::class);
    }

    public function category():object {
        return $this->belongsTo(Category::class,'cat_id');
    }
}
