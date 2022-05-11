<?php

namespace App\Http\Controllers;

use session;
use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Customer;

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
       

       $customer =  Customer::where('phone','LIKE','%' . $request->phone . '%')->first();
        if(!$customer){
            $customer = Customer::create([
                'name'=>$request->cutomer_name,
                'phone' => $request->phone
            ]);
        
        }
     
    
        $products = session('cart');
        $datas = [];
       foreach ($products as $product) {
             $sale = Sale::create([
                'product_id'=> $product['product_id'],
                'quantity'=>$product['quantity'],
                'customer_id'=>$customer->id,
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
            // return view('receipt',compact(''));
            // 
          
            // return redirect()->route('receipt',[$cutomer->id]);
        }else{
            dd('empty');
        }
       
   
    
        
       
    }
}

