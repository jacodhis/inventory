@extends('layouts.newapp')

@section('content')

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">


                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> All Products: {{count($products)}}</h3>
                            </div>
                           
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>description</th>
                                            <th>Qt sold</th>
                                            <th>total Amount</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                      @forelse ($products as $Product )
                                      
                                      <tr>
                                            <td>{{$Product->sku_no}}</td>
                                            <td>{{$Product->title}}</td>
                                            <td>{{$Product->sold}}</td>

                                            <td>
                                                {{$Product->amount}}
                                            </td>
                                        
                                            <td>
                                                <a href="{{route('product.show',[$Product->id])}}" class="btn btn-primary">View</a>
                                                @if(auth()->user()->Role == 'admin')
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
                                            <th>Qt sold</th>
                                            <th>total Amount</th>
                                            <th>Actions</th>
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
