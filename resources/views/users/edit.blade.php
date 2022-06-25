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
          <h3 class="card-title">Edit  {{$user->name}}  </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('user.update',[$user->id])}}" method="post">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" value="{{$user->name ?? ""}}" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Email</label>
              <input type="text" value="{{$user->email ?? ""}}"name="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="Phone">Phone</label>
              <input type="text"name="phone" class="form-control" placeholder="email" value="{{$user->phone}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="text" value="{{$user->email ?? ""}}"name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Role</label><small>({{$user->role->title ?? ""}})</small>
                <select name="role_id" class="form-control">
                    <option @disabled(true)>Update Role</option>
                    @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->title}}</option>
                    @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="shop">Shop</label><small>({{$user->shop_id}})</small>
                <select name="shop_id" class="form-control">
                    <option>Shop</option>
                    @foreach($shops as $shop)
                    <option value="{{$shop->id}}">{{$shop->name}}</option>
                    @endforeach
                </select>
              
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
    Edit   {{$user->name}}  
@endsection

@section('subtitle')
    Edit   {{$user->name}}  
@endsection
