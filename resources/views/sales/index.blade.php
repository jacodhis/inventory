@extends('layouts.newapp')

@section('content')

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">


                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> All Sales: {{count($sales)}}</h3>
                            </div>
                           
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Description</th>
                                            <th>Qt sold</th>
                                            <th>Product price</th>
                                            <th> Product total</th>
                                            <th>Shop Name</th>
                                            <th>Shop Location</th>
                                            <th>Customer Name</th>
                                           
                                            <th>Customer Phone</th>
                                           
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php    $total = 0;?> 
                                      @forelse ($sales as $sale )
                                      <?php  $total = $total + ($sale->Product->s_price + $sale->Product->s_vat) * $sale->quantity?>
                                   
                                     
                                      <tr>
                                           <td>{{$sale->Product->sku_no}}</td>
                                            <td>{{$sale->Product->title}}</td>
                                           
                                            <td>{{$sale->quantity}}</td>
                                            <td>{{$sale->Product->s_price + $sale->Product->s_vat}}</td>
                                            <td>{{($sale->Product->s_price + $sale->Product->s_vat) * $sale->quantity}}</td>
                                            <td>{{$sale->Shop->name ?? 'Null'}}</td>
                                            <td>{{$sale->Shop->location ?? 'Null'}}</td>
                                            <td>{{$sale->Customer->name}}</td>
                                            <td>{{$sale->Customer->phone ?? ""}}</td>                                                                                            
                                           <td>{{$sale->created_at->format('d-m-Y') }}</td>
                                        
                                            <td>
                                                <a href="{{route('sale.show',[$sale->id])}}" class="btn btn-primary">View</a>
                                             
                                            </td>
                                            
                                          
                                        </tr>
                                          
                                      @empty
                                          
                                      @endforelse
                                        
                                   
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Code</th>
                                            <th>Description</th>
                                            <th>Qt sold</th>
                                            <th>Product price</th>
                                            <th> {{$total}}</th>
                                            <th>Shop Name</th>
                                            <th>Shop Location</th>
                                            <th>Customer Name</th>
                                            
                                            <th>Customer Phone</th>
                                            
                                           
                                            <th>Date</th>
                                            <th>Actions</th>
                                       
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                       
                        </div>
                       
                    </div>
                
                </div>
               
            </div>
           
        </section>
        <!-- /.content -->
    <!-- /.content-wrapper -->
@endsection

@section('title')
    All Products Sold
@endsection

@section('subtitle')
   Welcome {{auth()->user()->Role->title}}
@endsection
