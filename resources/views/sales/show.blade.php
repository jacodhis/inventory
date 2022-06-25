@extends('layouts.newapp')

@section('content')

<div class="container ">
 <div class="card">
     <div class="container card-title">
         <h3 > {{$sale->product->name}}</h3>
     </div>
     <div class="#">
        <table>
            <tr>
                <th>Quantity : </th>
                <td>{{$sale->quantity}}</td>
               
            </tr>
            <tr>
                <th>Customer Name : </th>
                <td>{{$sale->customer->name}}</td>
            </tr>
            <tr>
                <th>Customer Phone : </th>
                <td>{{$sale->customer->phone}}</td>
            </tr>
             
        </table>
       
     </div>
 </div>
</div>

@endsection

@section('title')
       {{$sale->product->name}} 
@endsection

@section('subtitle')
{{$sale->product->title}} (<small>{{$sale->product->sku_no}}</small>)
@endsection
