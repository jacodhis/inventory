<?php

namespace App\Models;

use Illuminate\Support\Facades\Redirect;


class CalcTax
{
 
  public function Calc($data){
    if($data['purchase_price'] > $data['selling_price']){
      return back()->with('error','selling price value should Exceed purchase price');
    }
      $vat_s_price = 0.16 * $data['selling_price'];
      //tax computation on selling Price
      $rrp_plus_vat = $vat_s_price + $data['selling_price'];
      $rrp_less_vat = $data['selling_price'] - $vat_s_price;
      //tax computation on selling Price
      $vat_p_price = 0.16 * $data['purchase_price'];
      $pp_plus_vat = $vat_p_price + $data['purchase_price'];
      $pp_less_vat = $data['purchase_price'] - $vat_p_price;

      $product = Product::where('sku_no',$data['sku_no'])->first();
      if(!$product){
        Product::create([
          'title'=>$data['title'],
          'sku_no'=>$data['sku_no'],
          'p_price'=>$data['purchase_price'],
          's_price'=>$data['selling_price'],
          'entry'=>$data['entry'],
          'category_id'=>$data['category_id'],
  
          //tax
          's_vat'=>$vat_s_price,
          'rrp_plus_vat'=>$rrp_plus_vat,
          'rrp_less_vat'=>$rrp_less_vat,
          'p_vat'=>$vat_p_price,
          'pp_plus_vat'=>$pp_plus_vat,
          'pp_less_vat'=>$pp_less_vat,
          'shop_id'=>auth()->user()->shop_id
        ]);
        return redirect()->back()->with('error','product added successfully');
      }else{
        return redirect()->back()->with('error','product already exists');
      }
     

  }

  public function updateCalc($data,$product){
    if($data['purchase_price'] > $data['selling_price']){
      return back()->with('error','selling price value should Exceed purchase price');
     }
  $vat_s_price = 0.16 * $data['selling_price'];
  //tax computation on selling Price
  $rrp_plus_vat = $vat_s_price + $data['selling_price'];
  $rrp_less_vat = $data['selling_price'] - $vat_s_price;
  //tax computation on selling Price
  $vat_p_price = 0.16 * $data['purchase_price'];
  $pp_plus_vat = $vat_p_price + $data['purchase_price'];
  $pp_less_vat = $data['purchase_price'] - $vat_p_price;

  // $vat['vat_s_price'] = $vat_s_price;
  // $vat['rrp_plus_vat'] = $rrp_plus_vat;
  // $vat['rrp_less_vat'] = $rrp_less_vat;
  // $vat['vat_p_price'] = $vat_p_price;
  // $vat['pp_plus_vat'] = $pp_plus_vat;

  $product->title = $data['title'];
  $product->sku_no = $data['sku_no'];
  $product->p_price = $data['purchase_price'];
  $product->s_price = $data['selling_price'];
  $product->entry = $data['entry'];

  //tax
  $product->s_vat = $vat_s_price;
  $product->rrp_plus_vat = $rrp_plus_vat;
  $product->rrp_less_vat = $rrp_less_vat;
  $product->p_vat = $vat_p_price;
  $product->pp_plus_vat = $pp_plus_vat;
  $product->pp_less_vat = $pp_less_vat;
  $product->shop_id = auth()->user()->shop_id;
  if($product->save()){
    return redirect()->route('all.products')->with('success','product updated successfully');
  }
  return redirect()->route('all.products')->with('error','product not updated successfully');
  }
  
}
