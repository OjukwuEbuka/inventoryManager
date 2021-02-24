<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller
{
    public function index(){
        $cats = DB::table('categories')->get();
        return view('categories.index', compact('cats'));
    }
    
    public function store(Request $request){
        $data = $request->all();
        // dd($data);
        $catExists = DB::table('categories')->where('name', $data['name'])->exists();
        if($catExists){
            return response()->json(["exists"=>true]);
        }

        $cat = new Category;
        $cat->name = $data["name"];
        $cat->description = $data["description"];
        $cat->save();

        return response()->json(["success"=>true, "cat"=>$cat]);
    }

    public function delete(Request $request){
        $data = $request->all();

        $cat = Category::find($data['id']);
        $cat->delete();

        return response()->json(["success" => true, "id" => $data["id"]]);
    }
}
