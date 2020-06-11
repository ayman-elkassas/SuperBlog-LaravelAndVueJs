<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //one method if you want to add middleware excuted before calling routing apis from web
    //put your middlewares in __construct
    public function __construct()
    {
        $this->middleware('auth');
    }
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

    public function edit_category($id){
        $category = Category::find($id);
        return response()->json([
            'category'=>$category
        ],200);
    }

    public function update_category(Request $request,$id){
        $this->validate($request,[
            'cat_name'=>'required|min:2|max:50'
        ]);
        $category = Category::find($id);
        $category->cat_name = $request->cat_name;
        $category->save();
    }
}
