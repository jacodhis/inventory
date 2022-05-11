@extends('layouts.newapp')

@section('content')

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">


                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> All Products: {{count($sales)}}</h3>
                            </div>
                           
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>description</th>
                                            <th>Qt sold</th>
                                            <th>product price</th>
                                            <th>Customer Name</th>
                                            <th>Customer Phone</th>
                                            <th> product total</th>
                                            <th>grand total</th>
                                            {{-- <th>Actions</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php    $total = 0;?> 
                                      @forelse ($sales as $sale )
                                      <?php $total = $total+ ($sale->quantity * $sale->Product->s_price) ; ?>
                                      <tr>
                                        <td>{{$sale->Product->sku_no}}</td>
                                            <td>{{$sale->Product->title}}</td>
                                           
                                            <td>{{$sale->quantity}}</td>

                                            <td>
                                                {{$sale->Product->s_price}}
                                            </td>
                                            <td>
                                                {{$sale->customer_name}}
                                            </td>
                                            <td>
                                                {{$sale->phone}}
                                            </td>
                                            <td>{{$sale->Product->s_price * $sale->quantity}}</td>
                                            <td>{{$total}}</td>
                                        
                                            {{-- <td>
                                                <a href="{{route('product.show',[$Product->id])}}" class="btn btn-primary">View</a>
                                                @if(auth()->user()->Role == 'admin')
                                                <a href="{{route('product.delete',[$Product->id])}}" class="btn btn-danger">Delete</a>
                                                @endif
                                                <a href="{{route('product.edit',[$Product->id])}}" class="btn btn-warning">Edit</a>
                                               
                                            </td>
                                             --}}
                                          
                                        </tr>
                                          
                                      @empty
                                          
                                      @endforelse
                                        
                                   
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Code</th>
                                            <th>description</th>
                                            <th>Qt sold</th>
                                            <th>product price</th>
                                            <th>Customer Name</th>
                                            <th>Customer Phone</th>
                                            <th> product total</th>
                                            <th>grand total</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                       
                        </div>
                       
                    </div>
                
                </div>
               
            </div>
           
        </section>
        <!-- /.content -->
    <!-- /.content-wrapper -->
@endsection

@section('title')
    All Products Sold
@endsection

@section('subtitle')
    Products Sold
@endsection
