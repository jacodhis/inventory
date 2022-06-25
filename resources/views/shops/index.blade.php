@extends('layouts.newapp')

@section('content')

       
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                      

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> All Users: {{count($shops)}}</h3>
                               
                                <h3  style="text-align: right;"><a class="btn btn-primary" href="{{route('shops.create')}}">Add Shop</a></h3>
                             
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Location</th>
                                           <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @forelse ($shops as $shop )
                                      <tr>
                                            <td>{{$shop->name}}</td>
                                            <td>{{$shop->location}}</td>
                                            <td>
                                                <a href="{{route('shops.show',[$shop->id])}}" class="btn btn-primary">View</a>
                                                <a href="{{route('shops.delete',[$shop->id])}}" class="btn btn-danger">Delete</a>
                                                <a href="{{route('shops.edit',[$shop->id])}}" class="btn btn-warning">Edit</a>
                                            </td>
                                            
                                          
                                        </tr>
                                          
                                      @empty
                                          
                                      @endforelse
                                        
                                   
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Location</th>
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
    All Shops
@endsection

@section('subtitle')
    welcome {{auth()->user()->name}}
@endsection
