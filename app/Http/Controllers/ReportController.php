<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Purchase;

class ReportController extends Controller
{
    public function purchase(){
        return view('reports.purchases');
    }
    
    
    public function month(Request $request){
        $data = $request->all();

        $dateArr = explode('-', $data['purchaseMonth']);
        $products = DB::table('purchases')
            ->leftJoin('products', 'products.id', '=', 'purchases.item_id')
            ->whereMonth('purchases.created_at', $dateArr[1])
            ->whereYear('purchases.created_at', $dateArr[0])
            ->get();

        return response()->json(["products"=>$products, "date"=>date($data['purchaseMonth'])]);
    }
    
    public function day(Request $request){
        $data = $request->all();

        $products = DB::table('purchases')
            ->leftJoin('products', 'products.id', '=', 'purchases.item_id')
            ->whereDate('purchases.created_at', $data['purchaseDay'])
            ->get();
            
        return response()->json(["products"=>$products, "date"=>date($data['purchaseDay'])]);

    }
}
