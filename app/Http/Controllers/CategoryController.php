<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories = Category::paginate(20);
        return view('categories.index',compact('categories'));
    }
    public function create(){
       return view('categories.create');
    }
    public function store(StoreCategoryRequest $request){
        $data = $request->validated();
        Category::create($data);
        return back()->with('success','category added successfully');
     }
}
