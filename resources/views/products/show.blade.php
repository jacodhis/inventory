@extends('layouts.newapp')

@section('content')
 <h4 style="text-align: center">Additional Information</h4>
<div class="container ">
    <h3 style="text-align: center"> Tax on Sell</h3>
    <table class="table">
       <thead>
            <th>Item Code</th>
            <th>Selling Price</th>
            <th>Vat</th>
            <th>RRP + VAT</th>
            <th>RRP - VAT</th>
       </thead>
       <tbody>
            <tr>
                <td>{{$product->sku_no}}</td>
                <td>{{$product->s_price}}</td>
                <td>{{$product->s_vat}}</td>
                <td>{{$product->rrp_plus_vat}}</td>
                <td>{{$product->rrp_less_vat}}</td>
            
            </tr>
       </tbody>
       <thead>
        <th>Item Code</th>
        <th>Selling Price</th>
        {{-- <th>Discount %</th> --}}
        <th>Vat</th>
        <th>RRP + VAT</th>
        <th>RRP - VAT</th>
       </thead>
    </table>
 
  

</div>
<div class="container">
    <h3 style="text-align: center"> Tax on Buy</h3>
    <table class="table">
        <thead>
             <th>Item Code</th>
             <th>Purchase Price</th>
             <th>Vat</th>
             <th>PP + VAT</th>
             <th>PP - VAT</th>
        </thead>
        <tbody>
             <tr>
                 <td>{{$product->sku_no}}</td>
                 <td>{{$product->p_price}}</td>
                 <td>{{$product->p_vat}}</td>
                 <td>{{$product->pp_plus_vat}}</td>
                 <td>{{$product->pp_less_vat}}</td>
             
             </tr>
        </tbody>
        <thead>
            <th>Item Code</th>
            <th>Purchase Price</th>
            <th>Vat</th>
            <th>PP + VAT</th>
            <th>PP - VAT</th>
        </thead>
     </table>
</div>

@endsection

@section('title')
    Show   {{$product->sku_no}} 
@endsection

@section('subtitle')
   Show {{$product->sku_no}} 
@endsection
