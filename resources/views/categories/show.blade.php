@extends('layouts.newapp')

@section('content')

<div class="container ">
 <div class="card">
     <div class="container">
         <h3 > {{$category->name}}</h3>
         <h2 style="text-align:right">
            <a href="{{route('categories')}}" class="btn btn-success">Back</a>
        </h2>
     </div>  <div class="card-body">
        <table class="table table-hover">
            <tr>
                <td>
                    <p>Category Description:{{$category->description}}</p>
                    <p>Created At: {{$category->created_at->diffForHumans()}}</p>

                </td>
            </tr>
        </table>
       
        
       
  
 </div>
</div>

@endsection

@section('title')
       {{$category->name}} 
@endsection

@section('subtitle')
    {{$category->name}} 
@endsection
