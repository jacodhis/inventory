
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receit </title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <style>
        
            #logo{
                /* background-color:blue;  */
                /* width:100x;
                height:100px; */
        
        }
    </style>
<div class="container">
    
    <div class="col-8 mx-auto mt-3">   

    
     <div class="col-10 mx-auto mt-5">
        <div class="row ">
            <div class="col-6">
                <h4>NANA UWEZO LIMITED</h4>
                <b>MOTOR WORLD, JOGOO ROAD-NAIROBI</b></br>
                <small><a href="">admin@nanauwezo@co.ke</a></small></br>
                <small>PIN NO. P051882706H</small><br>
                <small>254716892409/0110927185</small></br></br>

                <b>BILL TO</b></br>
                Name:{{$details['customer']->name}}</br>
                Phone No.:{{$details['customer']->phone}}
            </div>

            <div class="col-6">
               <div id="logo">
                <img src="{{asset('images/logo.jpg')}}" alt="logo" class="rounded-circle"  class="float-right" height="70" width="70">
               </div>
            </div>
        </div>
     </div>

     
       <div class="col-10 mx-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>DESCRIPTION</th>
                        <th>PART NUMBER</th>
                        <th>QTY</th>
                        <th>UNIT PRICE @</th>
                        {{-- <th>VAT</th> --}}
                        <th>TOTAL</th>
                    </tr>
                </thead>

                <tbody>
                    <?php    $total = 0;?>
                    <?php    $total_vat = 0;?>
                    @foreach($details['sales'] as $data)
                    <tr>
                    <?php $total = $total+ ($data->quantity * $data->product->s_price) ; ?>
                    <?php $total_vat = $total_vat + $data->product->s_vat ; ?>
                        <td>{{$data->product->title ?? ""}}</td>
                        <td>{{$data->product->sku_no ?? ""}}</td>
                        <td>{{$data->quantity}}</td>
                        <td>{{$data->product->s_price + $data->product->s_vat}}</td>
                        {{-- <td>{{$data->product->s_vat ?? "0"}}</td> --}}
                        <td>{{$data->quantity * $data->product->s_price}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

           

          <div class="row">
            <div class="col-6">
                Thank You For Your Business
            </div>
            
            <div class="col-6 " >
                <p> TAX RATE : 16.00%</p> 
                <p>GRAND TOTAL :{{$total}}</p>
            </div>
          </div>

          <div style="text-align: right">
            <a id="print" onclick="printx()" class="btn btn-success btn-sm">print Receipt</a>
            <a href="{{route('all.products')}}" id="close" class="btn btn-primary btn-sm">Close</a>
          </div>

       </div>

 
    </div>


  

<script>
function printx(){
     document.getElementById('print').style.display = "none"
     document.getElementById('close').style.display = "none"

    window.print()
    document.getElementById("print").style.display = "inline"
    document.getElementById('close').style.display = "inline"
   
}
</script>
</body>
</html>
