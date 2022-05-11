<?php

namespace App\Http\Controllers;

use session;
use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    //
    public function all_sales(){
        $sales = Sale::paginate(20);
        return view('sales.index',compact('sales'));
    }
    public function store(Request $request){
        $request->validate([
          'cutomer_name'=>'required',
          'phone'=>'required'
        ]);

        //
        // $products  = session()->get('cart');
        $products = session('cart');
        $datas = [];
       foreach ($products as $product) {
             $sale = Sale::create([
                'product_id'=> $product['product_id'],
                'quantity'=>$product['quantity'],
                'customer_name'=>$request->cutomer_name,
                 'phone'=>$request->phone,
            ]);
            array_push($datas,$sale);
        }
        $request->session()->forget('cart');  
        if(!empty($datas)){
            foreach ($datas as $data) {
               $product = Product::find($data['product_id']);
               $rem_quantity = $product->entry-$data['quantity'];
               $product->entry = $rem_quantity;
               $product->update();
            }
            dd($datas);
          
            return redirect()->route('receipt',[$sale->id]);
        }else{
            dd('empty');
        }
       
   
    
        
       
    }
}

