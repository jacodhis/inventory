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
          <h3 class="card-title">Create User </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('user.store')}}" method="post">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control" placeholder="Enter Name">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text"name="email" class="form-control" placeholder="email">
            </div>
            <div class="form-group">
              <label for="Phone">Phone</label>
              <input type="text"name="phone" class="form-control" placeholder="email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Role</label>
                <select name="role_id" class="form-control">
                    <option @disabled(true)>Select Role</option>
                    @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->title}}</option>
                    @endforeach
                </select>
              
              </div>
               <div class="form-group">
                <label for="exampleInputPassword1">Assign Shop</label>
                <select name="shop_id" class="form-control">
                    <option @disabled(true)>Select Role</option>
                    @foreach($shops as $shop)
                    <option value="{{$shop->id}}">{{$shop->name}}</option>
                    @endforeach
                </select>
              
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
   Crete New User 
@endsection

@section('subtitle')
   Crete New User 
@endsection
