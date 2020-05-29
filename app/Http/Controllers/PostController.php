<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function all_post():object {
        $posts=Post::with('category','user')->get();
        return $posts;

//        $category=Category::with('posts')->get();
//        return $category;
    }
}
