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
        <form action="{{route('shops.store')}}" method="post">
            @csrf
          <div class="card-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Shop Name</label>
                <input type="text"  name="name"  class="form-control" id="exampleInputEmail1" placeholder="Enter Description">
              </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Description</label>
             <textarea name="description" id="" cols="30" rows="10"></textarea>
            </div>
           
            <div class="form-group">
              <label for="exampleInputPassword1">location</label>
              <input type="text" name="location"  class="form-control" id="exampleInputPassword1" placeholder="Code">
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
    Create  Shop
@endsection

@section('subtitle')
Create  Shop
@endsection