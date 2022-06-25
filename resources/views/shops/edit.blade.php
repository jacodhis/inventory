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
          <h3 class="card-title">Create/Add Shop</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('shops.update',[$shop->id])}}" method="post">
            @method('PUT')
            @csrf
          <div class="card-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Shop Name</label>
                <input type="text"  name="name" value="{{$shop->name}}"  class="form-control" id="exampleInputEmail1" placeholder="Enter Description">
              </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Description</label>
             <textarea name="description" class="form-control" id="" cols="30" rows="10">{{$shop->description}}</textarea>
            </div>
           
            <div class="form-group">
              <label for="exampleInputPassword1">location</label>
              <input type="text" name="location"  value="{{$shop->location}}" class="form-control" id="exampleInputPassword1" placeholder="Code">
            </div>

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
    Update  Shop
@endsection

@section('subtitle')
   Update  Shop
@endsection