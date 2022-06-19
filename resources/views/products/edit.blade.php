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
          <h3 class="card-title">Edit {{$product->sku_no}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('product.update',[$product->id])}}" method="post">
            @csrf
            <input type="hidden" name="category_id" value="{{$product->Category->id}}">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Description</label>
              <input type="text" value="{{$product->title ?? ""}}" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Description">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Code</label>
              <input type="text" value="{{$product->sku_no ?? ""}}" name="sku_no" class="form-control" id="exampleInputPassword1" placeholder="Enter Code">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Quantity </label>
              <input type="number" value="{{$product->entry ?? ""}}" name="entry"  min="1" class="form-control" id="exampleInputPassword1" placeholder="Enter Quantity ">
          </div>


            <div class="form-group">
              <label for="exampleInputPassword1">Purchase Price</label>
              <input type="number" value="{{$product->p_price ?? ""}}" name="purchase_price"  min="1" class="form-control" id="exampleInputPassword1" placeholder="Purchase Price">
          </div>

          
          <div class="form-group">
            <label for="exampleInputPassword1">Selling Price</label>
            <input type="number" value="{{$product->s_price ?? ""}}" name="selling_price"  min="1" class="form-control" id="exampleInputPassword1" placeholder="Selling Price">
         </div>
          
            
                  <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
      </div>
@endsection

@section('title')
    Edit   {{$product->sku_no}}  
@endsection

@section('subtitle')
    Edit   {{$product->sku_no}} 
@endsection
