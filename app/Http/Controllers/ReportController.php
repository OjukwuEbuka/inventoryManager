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
    
    
    public function monthPurchase(Request $request){
        $data = $request->all();

        $dateArr = explode('-', $data['purchaseMonth']);
        $products = DB::table('purchases')
            ->leftJoin('products', 'products.id', '=', 'purchases.item_id')
            ->whereMonth('purchases.created_at', $dateArr[1])
            ->whereYear('purchases.created_at', $dateArr[0])
            ->get();

        return response()->json(["products"=>$products, "date"=>date($data['purchaseMonth'])]);
    }
    
    public function dayPurchase(Request $request){
        $data = $request->all();

        $products = DB::table('purchases')
            ->leftJoin('products', 'products.id', '=', 'purchases.item_id')
            ->whereDate('purchases.created_at', $data['purchaseDay'])
            ->get();
            
        return response()->json(["products"=>$products, "date"=>date($data['purchaseDay'])]);

    }
    
    public function sale(){
        return view('reports.sales');
    }
    
    
    public function monthSale(Request $request){
        $data = $request->all();

        $dateArr = explode('-', $data['saleMonth']);
        $products = DB::table('sales')->select('sales.item_id', 'sales.quantity', 'sales.unit_price', 'products.name')
            ->leftJoin('products', 'products.id', '=', 'sales.item_id')
            ->whereMonth('sales.created_at', $dateArr[1])
            ->whereYear('sales.created_at', $dateArr[0])
            ->get();

        return response()->json(["products"=>$products, "date"=>date($data['saleMonth'])]);
    }
    
    public function daySale(Request $request){
        $data = $request->all();

        $products = DB::table('sales')->select('sales.item_id', 'sales.quantity', 'sales.unit_price', 'products.name')
            ->leftJoin('products', 'products.id', '=', 'sales.item_id')
            ->whereDate('sales.created_at', $data['saleDay'])
            ->get();
            
        return response()->json(["products"=>$products, "date"=>date($data['saleDay'])]);

    }
}
