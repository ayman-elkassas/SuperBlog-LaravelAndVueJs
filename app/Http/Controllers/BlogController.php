<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function get_all_plog_post(){
        $blogpost=Post::with('user','category')->orderBy('id','desc')->get();
        return response()->json([
            'blogpost'=>$blogpost
        ],200);
    }

    public function getpost_by_id($id){
        $post = Post::with('user','category')->where('id',$id)->first();
        return response()->json([
            'post'=>$post
        ],200);
    }
}
