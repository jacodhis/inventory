<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use session;

class CartController extends Controller
{
    //
    public function my_cart_items(){
        return view('customers.cart');
    }
    public function add_to_cart(Request $request,$id){
        $product = product::findorFail($id);
        $cart  = session()->get('cart');
       
         $cart[$id] = [
             'product_id'=>$product->id,
             'product_code' => $product->sku_no,
             'product_name'=>$product->title,
             'product_price' => $product->s_price,
             'quantity' => $request->qt,
         ];
        
          session()->put('cart',$cart);
         return redirect()->back()->with('success','product added to cart');
              
    }

    //remove from cart 
    public function cart_remove(Request $request,$productId){
        $productId = product::findorFail($productId);
        $products = session('cart');
    
     foreach($products as $key =>$value){
      
         if($value['name'] == $art->name){
             unset($products[$key]);
             session()->put('cart',$products);
               return redirect()->route('mycart')->with('success','art deleted from cart');
         }
     }
       }
   
}
