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
    public function add_to_cart(Request $request,Product $product){
        if($request->qt == null){
            return back()->with('error','sorry.. Enter Sell Quantity');
        }
        if($product->entry == 0){
            return back()->with('error','sorry.. no quantity to sell');
        }
        if($product->entry < $request->qt){
            return back()->with('error','sorry.. quantity entered should not exceed quantity available');
        }
        $cart  = session()->get('cart');
       
         $cart[$product->id] = [
             'product_id'=>$product->id,
             'product_code' => $product->sku_no,
             'product_name'=>$product->title,
             'product_price' => $product->rrp_plus_vat,
             'quantity' => $request->qt,
         ];
        
          session()->put('cart',$cart);
         return redirect()->back()->with('success','product added to cart');
              
    }

    //remove from cart 
    public function cart_remove(Request $request,Product $product){
        $products = session('cart');
        foreach($products as $key =>$value){
            if($value['product_code'] == $product->sku_no){
                unset($products[$key]);
                session()->put('cart',$products);
                return back()->with('success','product  deleted from cart');
            }
        }
       }
   
}
