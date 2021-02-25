<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Sale;

class SaleController extends Controller
{
    public function index(){
        $prods = Product::all();

        return view('sales.index', compact('prods'));
    }
    
    public function store(Request $request){
        $data = $request->all();
        
        foreach ($data as $key => $val) {
            $prod = Product::find($val['id']);
            $prod->quantity = $prod->quantity - $val['quantity'];
            $prod->save();

            $sale = new Sale;
            $sale->item_id = $val['id'];
            $sale->quantity = $val['quantity'];
            $sale->unit_price = $val['price'];

            $sale->save();
        }

        return response()->json(["success"=>true]);
    }
}
