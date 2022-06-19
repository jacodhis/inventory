@extends('layouts.newapp')

@section('content')

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                              
                                <h3 class="card-title">Categories</h3>
                              
                               
                            </div>

                        </div>
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> All Categories: {{count($categories)}}</h3>
                                <h3  style="text-align: right;"><a  class="btn btn-primary" href="{{route('category.create')}}">Add Categories</a></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
                                            <th>DESCRIPTION</th>
                                            <th>Actions</th>
                                           
                                          
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                      @forelse ($categories ?? "" as $category )
                                      <tr>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->description}}</td>
                                            <td><a href="{{route('category.show',$category->id)}}" class="btn btn-primary">View</a>
                                            <a href="{{route('category.edit',$category->id)}}" class="btn btn-success">Edit</a>
                                            <a href="{{route('category.delete',$category->id)}}" class="btn btn-danger">Delete</a>
                                        </td>
                                        </tr>
                                          
                                      @empty
                                          
                                      @endforelse
                                        
                                   
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>NAME</th>
                                            <th>DESCRIPTION</th>
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
    All Categories
@endsection

@section('subtitle')
    Categories
@endsection
