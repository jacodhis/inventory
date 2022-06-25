@extends('layouts.newapp')

@section('content')

<div class="container ">
 <div class="card">
     <div class="container">
         <h3 > {{$shop->name}}</h3>
         <h2 style="text-align:right">
            <a href="{{route('shops.index')}}" class="btn btn-success">Back</a>
        </h2>
     </div>  <div class="card-body">
        <table class="table table-hover">
            <tr>
                <td>
                    <p>Shop Name:{{$shop->description}}</p>
                    <p>Shop Description:{{$shop->location}}</p>
                    <p>Created At: {{$shop->created_at->diffForHumans()}}</p>

                </td>
            </tr>
        </table>
       
        
       
  
 </div>
</div>

@endsection

@section('title')
       {{$shop->name}} 
@endsection

@section('subtitle')
    {{$shop->name}} 
@endsection
