{{-- <h2>{{$customer}}</h2> --}}
{{-- @foreach ($datas as $item)

    {{$item}}
@endforeach --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    
<div class="card">
    Name:{{$customer->name}}
<table class="table">
    <thead>
       <tr>
        <th>DESCRIPTION</th>
        <th>PART NUMBER</th>
        <th>QTY</th>
        <th>UNIT PRICE @</th>
        <th>VAT</th>
        <th>TOTAL</th>
       </tr>
    </thead>

    <tbody>
       
            <?php    $total = 0;?>
            <?php    $total_vat = 0;?>
       @foreach($datas as $data)
       <tr>
       {{-- <td>{{$data->product}}</td> --}}
       
       <?php $total = $total+ ($data->quantity * $data->product->s_price) ; ?>
       <?php $total_vat = $total_vat + $data->product->s_vat ; ?>
        <td>{{$data->product->title ?? ""}}</td>
        <td>{{$data->product->sku_no ?? ""}}</td>
        <td>{{$data->quantity}}</td>
        <td>{{$data->product->s_price}}</td>
        <td>{{$data->product->s_vat ?? "0"}}</td>
        <td>{{$data->quantity * $data->product->s_price}}</td>
    </tr>
       @endforeach
     
    </tbody>
    <thead>
        <tr>
         <th></th>
         <th></th>
         <th></th>
         <th> </th>
         <th>{{$total_vat}}</th>
         <th>{{$total}}</th>
        </tr>
     </thead>
</table>

</div>




</body>
</html>
