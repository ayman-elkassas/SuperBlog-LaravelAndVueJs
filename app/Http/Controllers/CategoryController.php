<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function add_category(Request $request)
    {
//        return $request->all();
        $this->validate($request,[
            'cat_name'=>'required|min:2|max:50'
        ]);

        $category=New Category();
        $category->cat_name=$request->cat_name;
        $category->save();

        return ['message'=>'Ok'];
    }

    public function all_category(){
        $categories=Category::all();
        return response()->json([
            'categories'=>$categories
        ],200);
    }

    public function delete_category($id){
        $category=Category::find($id);
        $category->delete();
    }
}
