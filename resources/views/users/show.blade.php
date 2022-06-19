@extends('layouts.newapp')

@section('content')

<div class="container ">
 <div class="card">
     <div class="container card-title">
         <h3 > {{$user->name}}</h3>
     </div>
     <div class="card-body">
         <p>EMAIL:{{$user->email}}</p>
         <p>ROLE: {{$user->Role->title}}</p>
        
       
     </div>
 </div>
</div>

@endsection

@section('title')
       {{$user->name}} 
@endsection

@section('subtitle')
    {{$user->name}} 
@endsection
