@extends('layouts.newapp')

@section('content')

{{-- @if(session('success'))

                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @endif --}}

       
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                @if(session('cart'))
                                
                                <h3 class="card-title">Cart  : {{count(session('cart'))}}</h3>
                               @else
                               <p>0</p>
                               @endif
                               
                            </div>

                        </div>
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> All Products: {{count($products)}}</h3>
                                <h3  style="text-align: right;"><a  class="btn btn-primary" href="{{route('product.create')}}">Add Product</a></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>description</th>
                                            <th>Entry</th>
                                            <th>PP</th>
                                            <th>SP</th>
                                            <th>Qt Sell</th>
                                            <th>Qt Add</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                      @forelse ($products as $Product )
                                      <tr>
                                            <td>{{$Product->sku_no}}</td>
                                            <td>{{$Product->title}}</td>
                                            <td>{{$Product->entry}}</td>
                                            <td>{{$Product->p_price}}</td>
                                            <td>{{$Product->s_price}}</td>
                                            <td>
                                              {{-- <form action="{{route('product.soldupdated',[$Product->id])}}" method="post"> --}}
                                                <form action="{{route('cart.addtocart',[$Product->id])}}" method="post">
                                                @csrf
                                                <input type="number" min="1" name="qt">
                                               <button type="submit" class="btn btn-primary">submit</button>
                                            </form>
                                            </td>
                                            <td>
                                                <form action="{{route('product.addupdated',[$Product->id])}}" method="post">
                                                  @csrf
                                                  <input type="number"  min="1" name="qt_add">
                                                 <button type="submit" class="btn btn-primary">submit</button>
                                              </form>
                                              </td>
                                            <td>
                                                <a href="{{route('product.show',[$Product->id])}}" class="btn btn-primary">View</a>
                                                @if(auth()->user()->role_id == '1')
                                                <a href="{{route('product.delete',[$Product->id])}}" class="btn btn-danger">Delete</a>
                                                @endif
                                                <a href="{{route('product.edit',[$Product->id])}}" class="btn btn-warning">Edit</a>
                                            </td>
                                            
                                          
                                        </tr>
                                          
                                      @empty
                                          
                                      @endforelse
                                        
                                   
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Code</th>
                                            <th>description</th>
                                            <th>Entry</th>
                                            <th>PP</th>
                                            <th>SP</th>
                                            <th>Qt Sell</th>
                                            <th>Qt Add</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    <!-- /.content-wrapper -->
@endsection

@section('title')
    All Products
@endsection

@section('subtitle')
    Products
@endsection
