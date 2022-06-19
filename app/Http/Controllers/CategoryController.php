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
        Category::create($request->validated());
        return back()->with('success','category added successfully');
     }
     public function show(Category $category){
        return view('categories.show',compact('category'));
     }
     public function edit(Category $category){
          return view('categories.edit',compact('category'));
      }
      public function update(StoreCategoryRequest  $request, Category $category){
       $category->update($request->validated());
       return redirect()->route('categories')->with('success','category updated successfully');
    }
      public function delete(Category $category){
        $category->delete();
        return back()->with('success','category deleted successfully');
      }
}
