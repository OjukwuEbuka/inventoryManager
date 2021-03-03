<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function index(){
        $prods = Product::all();
        $cats = Category::all();

        return view('products.index', compact('prods', 'cats'));
    }

    public function store(Request $request){
        $data = $request->all();
        // dd($data);
        $prodExists = Product::where('name', $data['name'])->exists();
        if($prodExists){
            return response()->json(["exists"=>true]);
        }

        $prod = new Product;
        $prod->name = $data["name"];
        $prod->unit = (int) $data["unit"];
        $prod->category_id = $data["category"];
        $prod->current_price = $data["price"];
        $prod->save();

        return response()->json(["success"=>true, "prod"=>$prod]);
    }

    public function delete(Request $request){
        $data = $request->all();

        $prod = Product::find($data['id']);
        $prod->delete();

        return response()->json(["success" => true, "id" => $data["id"]]);
    }
}
