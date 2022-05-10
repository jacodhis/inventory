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
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Description</th>
                                            <th>Entry</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @forelse ($products as $Product )
                                      <tr>
                                            <td>{{$Product->sku_no}}</td>
                                            <td>{{$Product->title}}</td>
                                            <td>{{$Product->bought}}</td>
                                        
                                            <td>
                                                <a href="{{route('product.show',[$Product->id])}}" class="btn btn-primary">View</a>
                                                <a href="{{route('product.insert',[$Product->id])}}" class="btn btn-danger">Insert</a>
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
    All Products Removed
@endsection

@section('subtitle')
    Products Deleted from Products Table
@endsection
