<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Property;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
        //1 means not active
        $products = Product::query()
                              ->where('state_id',1)
                              ->orderBy('created_at','desc')->paginate(20);
      return view('Products.index',compact('products'));
    }
    public function added(){
        $products = Product::where('bought' ,'!=', '')->orderBy('created_at','desc')->get();
       return view('products.added',compact('products'));
    }
    public function sold(){
       $products = Product::where('sold' ,'!=', '')->orderBy('created_at','desc')->get();
        return view('products.sold',compact('products'));
    }
    public function deletedProducts(){
        $products = Product::where('state_id',2)->paginate(20);
        return view('Products.deleted',compact('products'));
    }
    public function create(){
        // $categories = Category::get();
        return view('Products.create');
    }
    public function store(Request $request){
         $data = $request->validate([
               'title'=>'required',
               'sku_no'=>'required',
               'purchase_price'=>'required',
               'selling_price'=>'required',
               'entry'=>'required'
        ]);
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
        

        
        $product = Product::where('sku_no',$request->sku_no)->first();
        if($product == ""){
            Product::create([
                'title'=>$data['title'],
                'sku_no'=>$data['sku_no'],
                'p_price'=>$data['purchase_price'],
                's_price'=>$data['selling_price'],
                'entry'=>$data['entry'],

                //tax
                's_vat'=>$vat_s_price,
                'rrp_plus_vat'=>$rrp_plus_vat,
                'rrp_less_vat'=>$rrp_less_vat,
                'p_vat'=>$vat_p_price,
                'pp_plus_vat'=>$pp_plus_vat,
                'pp_less_vat'=>$pp_less_vat,

            ]);
            
            return redirect()->route('all.products')->with('success','product added successfully ');;
        }
       return back()->with('error','product with code entered already exists');
        
      
    }
    public function show($id){
        $product = Product::findorFail($id);
        // dd($product);
        // $Property = $product->Property;
      
      
        return view('Products.show',compact('product'));
    }
    public function edit($id){
        $product = Product::findorFail($id);
        return view('Products.edit',compact('product'));
    }
    public function update( Request $request,$id){
      $data = $request->validate([
              'title'=> 'required',
              'sku_no'=>'required',
              'purchase_price'=>'required',
               'selling_price'=>'required',
        ]);

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

        $product = Product::findorFail($id);


        $product->title = $data['title'];
        $product->sku_no = $data['sku_no'];
        $product->p_price = $data['purchase_price'];
        $product->s_price = $data['selling_price'];
        $product->entry = $data['selling_price'];

        //tax
        $product->s_vat = $vat_s_price;
        $product->rrp_plus_vat = $rrp_plus_vat;
        $product->rrp_less_vat = $rrp_less_vat;
        $product->p_vat = $vat_p_price;
        $product->pp_plus_vat = $pp_plus_vat;
        $product->pp_less_vat = $pp_less_vat;


    //    if($product->Property){
    //        $product->Property->tax = $request->tax;
    //        $product->Property->save();
    //    }
       $product->save();      
        return redirect()->route('all.products')->with('success','product updated successfully');
    }


    public function updatesold(Request $request,$id){
        $product  = Product::findorFail($id);
        $qt = $product->sold;
        if($request->qt > $product->entry){
            return back()->with('eror','QT cannot be bigger than Entry');
        }
        $rem = $product->entry-$request->qt;
        $product->sold = $request->qt + $qt;
        $product->amount  = $product->amount + ($product->s_price * $request->qt);
        $product->entry = $rem;
        $product->update();
        return redirect()->route('products.sold');
     }
     public function updateadd(Request $request,$id){
        
        $product  = Product::findorFail($id);
        
        $rem = $product->entry+$request->qt_add;
        $product->bought = $product->bought + $request->qt_add;
        $product->entry = $rem;
        $product->update();
        return redirect()->route('products.added');
     }

     public function delete($id){
        $product  = Product::findorFail($id);
        $product->state_id= 2;
        $product->update();
        return redirect()->route('products.deleted');
     }
     public function insert($id){
        $product  = Product::findorFail($id);
        $product->state_id= 1;
        $product->update();
        return redirect()->route('products.deleted');
     }
     
}
