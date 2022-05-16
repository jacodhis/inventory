@extends('layouts.newapp')

@section('content')
<div class="container">
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif
    
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create/Add Product</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('product.store')}}" method="post">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputPassword1">Category</label>
             <select name="category_id" id="" class="form-control">
               <option value="" disabled>select Product Category</option>
               @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
               @endforeach
              
             </select>
          </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Description</label>
              <input type="text"  name="title"  class="form-control" id="exampleInputEmail1" placeholder="Enter Description">
            </div>
           
            <div class="form-group">
              <label for="exampleInputPassword1">Code</label>
              <input type="text" name="sku_no"  class="form-control" id="exampleInputPassword1" placeholder="Code">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Quantity </label>
              <input type="number" name="entry"  min="1" class="form-control" id="exampleInputPassword1" placeholder="Enter Quantity ">
          </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Purchase Price</label>
                <input type="number" name="purchase_price"  min="1" class="form-control" id="exampleInputPassword1" placeholder="Purchase Price">
            </div>

            
            <div class="form-group">
              <label for="exampleInputPassword1">Selling Price</label>
              <input type="number" name="selling_price"  min="1" class="form-control" id="exampleInputPassword1" placeholder="Selling Price">
          </div>
            
            
        
           
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
        </form>
      </div>
      </div>
@endsection

@section('title')
    Create  product
@endsection

@section('subtitle')
Create  product
@endsection
