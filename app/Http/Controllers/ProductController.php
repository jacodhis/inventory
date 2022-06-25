<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

use App\Http\Requests\ProductRequest;
use App\Models\CalcTax;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function index(){
        //1 means not active
       if(auth()->user()->role_id ==1){
        $products = Product::where('state_id',1)
                             ->orderBy('created_at','desc')->paginate(100);
       }else{
        $products = Product::join('shops','shops.id','products.shop_id')
                            ->where('shops.id',Auth::user()->shop_id)
                            ->where('products.state_id',1)
                            ->orderBy('products.created_at','desc')
                            ->select('products.*')
                            ->paginate(30);

       }
      
      
      return view('products.index',compact('products'));
    }
    public function added(){
        $products = Product::where('bought' ,'!=', '')
                            ->orderBy('created_at','desc')
                            ->paginate();
       return view('products.added',compact('products'));
    }

    public function deletedProducts(){
        $products = Product::where('state_id',2)
                            ->paginate(20);
        return view('products.deleted',compact('products'));
    }
    public function create(){
        $categories = Category::select(['id','name'])->orderBy('name','asc')->get();
        return view('products.create',compact('categories'));
    }
    public function store(ProductRequest $request){
       $data = $request->validated();
       $cala = new CalcTax();
       $calcResult =  $cala->Calc($data); 
       echo $calcResult;
       
    }
    public function show(Product $product){
        return view('products.show',compact('product'));
    }
    public function edit(Product $product){
        return view('products.edit',compact('product'));
    }
    public function update(ProductRequest $request,Product $product){
        $data = $request->validated();
        $cala = new CalcTax();
        $calcResult =  $cala->updateCalc($data,$product); 
        echo $calcResult;
       
    
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
     public function updateadd(Request $request,Product $product){
 
        $rem = $product->entry+$request->qt_add;
        $product->bought = $product->bought + $request->qt_add;
        $product->entry = $rem;
        $product->update();
        return redirect()->route('products.added');
     }

     public function delete(Product $product){
        $product->state_id= 2;
        $product->update();
        return redirect()->route('all.products')->with('success','product deleted successfully');
     }
     public function insert(Product $product){
        $product->state_id= 1;
        $product->update();
        return redirect()->route('products.deleted');
     }
     
}
