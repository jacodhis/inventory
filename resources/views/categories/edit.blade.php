@extends('layouts.newapp')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Category</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('category.update',$category->id)}}" method="post">
        @csrf
      <div class="card-body">
          
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name"  class="form-control" value="{{$category->name}}" placeholder=" Enter Category name">
          </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Description</label>
          <textarea name="description" id="" cols="10" rows="5" class="form-control">{{$category->description}}</textarea>
          
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
      users 
@endsection

@section('subtitle')
   users subtitle
@endsection
