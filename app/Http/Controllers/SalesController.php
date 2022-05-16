<?php

namespace App\Http\Controllers;

use session;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Customer;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use PDF;

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

       $customer =  Customer::where('phone', $request->phone)->first();
       if (!session()->has('cart')) {
         return redirect()->route('all.products')->with('error','no products in the Cart');
       }
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
            $details['datas'] = $datas;
            $details['customer'] =$customer;
            if(!empty($datas)){
                // $pdf = PDF::loadView('pdf.receipts', $details);
                // dd($pdf);
                // download PDF file with download method
                // return $pdf->download('Nana-Uwezo-Receit.pdf');

                return view('customers.receipt',compact('datas','customer'));
            }
          
            
        }else{
            dd('empty');
        }
       
   
    
        
       
    }
}

