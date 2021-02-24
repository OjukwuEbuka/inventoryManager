<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Purchase;

class PurchaseController extends Controller
{
    public function index(){
        $prods = Product::all();

        return view('purchases.index', compact('prods'));
    }

    public function store(Request $request){
        $data = $request->all();
        // dd($data);

        try {
            foreach ($data as $key => $val) {
            
                $purch = new Purchase;
                $purch->item_id = $val["prodId"];
                $purch->quantity = $val["prodQty"];
                $purch->unit_cost = $val["prodCost"];
                $purch->save();
    
                $prod = Product::find($val["prodId"]);
                $prod->current_price = $val["prodPrice"];
                $prod->quantity = $prod->quantity + (int) $val["prodQty"];
                $prod->save();                
            }

        } catch (\Throwable $th) {
            throw $th;
        }
        
        return response()->json(["success"=>true, "purch"=>$purch]);
    }

}
