@extends('layouts.newapp')

@section('content')

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> All Products: {{count($products)}}</h3>
                                @if (auth()->user()->role_id == 2)
                                <h3  style="text-align: right;"><a  class="btn btn-primary" href="{{route('product.create')}}">Add Product</a></h3>
                                @else
                                    @if(session('cart'))
                                    <h3  style="text-align: right;"><a  class="btn btn-primary" href="{{route('cart.items')}}">Cart  : {{count(session('cart'))}}</a></h3>
                                    @else
                                    <h3  style="text-align: right;"><a  class="btn btn-primary" href="{{route('cart.items')}}">Cart [0]</a></h3>
                                    
                                 
                                    @endif
                                @endif
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>description</th>
                                            <th>Entry</th>
                                            {{-- <th>PP</th> --}}
                                            <th>SP</th>
                                            @if (auth()->user()->role_id == 3) 
                                            <th>Qt Sell</th>
                                            @endif

                                            @if (auth()->user()->role_id == 2)
                                            <th>Qt Add</th>
                                            @endif
                                            @if(auth()->user()->role_id == 2 || auth()->user()->role_id == 1)
                                            <th>Actions</th>
                                            @endif
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                      @forelse ($products as $Product )
                                      <tr>
                                            <td>{{$Product->sku_no}}</td>
                                            <td>{{$Product->title}}</td>
                                            <td>{{$Product->entry}}</td>
                                            {{-- <td>{{$Product->p_price}}</td> --}}
                                            <td>{{$Product->s_price + $Product->s_vat}}</td>
                                            @if (auth()->user()->role_id == 3) 
                                            <td>
                                              {{-- <form action="{{route('product.soldupdated',[$Product->id])}}" method="post"> --}}
                                                <form action="{{route('cart.addtocart',[$Product->id])}}" method="post">
                                                @csrf
                                                <input type="number" min="1" name="qt">
                                               <button type="submit" class="btn btn-primary">submit</button>
                                            </form>
                                            </td>
                                            @endif

                                            @if (auth()->user()->role_id == 2)
                                            <td>
                                                <form action="{{route('product.addupdated',[$Product->id])}}" method="post">
                                                  @csrf
                                                  <input type="number"  min="1" name="qt_add">
                                                 <button type="submit" class="btn btn-primary">submit</button>
                                              </form>
                                              </td>
                                            @endif

                                            @if(auth()->user()->role_id == 2 || auth()->user()->role_id == 1)
                                            <td>
                                                @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                                 <a href="{{route('product.show',[$Product->id])}}" class="btn btn-primary">View</a>
                                                @endif

                                                @if(auth()->user()->role_id == 1)
                                                <a href="{{route('product.delete',[$Product->id])}}" class="btn btn-danger">Delete</a>
                                                @endif

                                                @if(auth()->user()->role_id == 2)
                                                <a href="{{route('product.edit',[$Product->id])}}" class="btn btn-warning">Edit</a>
                                                @endif
                                            </td>
                                            @endif
                                            
                                          
                                        </tr>
                                          
                                      @empty
                                          
                                      @endforelse
                                        
                                   
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Code</th>
                                            <th>description</th>
                                            <th>Entry</th>
                                            {{-- <th>PP</th> --}}
                                            <th>SP</th>
                                            @if (auth()->user()->role_id == 3) 
                                            <th>Qt Sell</th>
                                            @endif
                                            @if (auth()->user()->role_id == 2)
                                            <th>Qt Add</th>
                                            @endif
                                            @if(auth()->user()->role_id == 2 || auth()->user()->role_id == 1)
                                            <th>Actions</th>
                                            @endif
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
    welcome {{auth()->user()->Role->title}}
@endsection

@section('subtitle')
   Welcome {{auth()->user()->Role->title}}
@endsection
