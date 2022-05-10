<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index(){
        $customers = Customer::paginate(15);
        return view('customer.index',compact('customers'));
    }
    public function create(){
        return view('customer.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'',
            'ref'=>'required'

        ]);
        $customer = Customer::create($data);
        if($customer){
            return redirect()->route('');
        }
    }
}
