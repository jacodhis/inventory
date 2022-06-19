<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Customer;


use App\Http\Requests\CustomerRequest;

class SalesController extends Controller
{
    //
    public function all_sales(){
        $sales = Sale::orderByDesc('created_at')->paginate(4);
        return view('sales.index',compact('sales'));
    }
    public function store(CustomerRequest $request){
       $customer =  Customer::where('phone', $request->phone)->first();
       if(!$customer) {
         $customer =  Customer::create($request->validated());
       }
       $products = session('cart');
       if (!$products) {
         return redirect()->route('all.products')->with('error','no products in the Cart');
       }
    
        $sales = [];
       foreach ($products as $product) {
             $sale = Sale::create([
                'product_id'=> $product['product_id'],
                'quantity'=>$product['quantity'],
                'customer_id'=>$customer->id,
            ]);
            array_push($sales,$sale);
        }
       
        $request->session()->forget('cart');  
     
            foreach ($sales as $sale) {
               $product = Product::find($sale['product_id']);
               $product->entry =  $product->entry-$sale['quantity'];
               $product->update();
            }
            $details['sales'] = $sales;
            $details['customer'] = $customer;
            return view('customers.receipt',compact('details'));
          
               
            
    
    
        
       
    }
}

