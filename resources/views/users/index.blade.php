@extends('layouts.newapp')

@section('content')

       
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                      

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> All Users: {{count($users)}}</h3>
                                @if(auth()->user()->role_id == '1')
                                <h3  style="text-align: right;"><a class="btn btn-primary" href="{{route('user.create')}}">Add User</a></h3>
                                @endif
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                           <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @forelse ($users as $user )
                                      <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->Role->title ?? ""}}</td>
                                           
                                            <td>
                                                <a href="{{route('user.show',[$user->id])}}" class="btn btn-primary">View</a>
                                                @if(auth()->user()->Role->title == 'admin')
                                                <a href="{{route('user.delete',[$user->id])}}" class="btn btn-danger">Delete</a>
                                                <a href="{{route('user.edit',[$user->id])}}" class="btn btn-warning">Edit</a>
                                                @endif
                                            </td>
                                            
                                          
                                        </tr>
                                          
                                      @empty
                                          
                                      @endforelse
                                        
                                   
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
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
    All Users
@endsection

@section('subtitle')
    welcome {{auth()->user()->name}}
@endsection
