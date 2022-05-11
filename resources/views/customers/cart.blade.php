@extends('layouts.newapp')
<?php 
 session_start() ;
?>
@section('content')

       
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                       

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> All Products:  
                                    @if(session('cart'))
                                            <h3 class="card-title">Cart  : {{count(session('cart'))}}</h3>
                                        @else
                                        <p>Cart [0]</p>
                                        @endif
                                   </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                               
                                    <div class="row">
                                        <div class="col-md-8">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                     <th>Product Code</th>
                                                    <th>Product name</th>
                                                    <th>Product Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                    <th>Actions</th>
                                                  
                                                    </tr>
                                                </thead>
                                            <tbody >
                                                
                                               <?php    $total = 0;?>
                                                @if(session('cart'))
                                        
                                                 @foreach(session('cart') as $id => $product)
                                                  
                                                <?php $total = $total+ ($product['quantity'] * $product['product_price']) ; ?>
                                                 <tr>
                                                    <td><?php echo $product['product_code'];?></td>
                                                            <td><?php echo $product['product_name'];?></td>
                                                            <td><?php echo $product['product_price'];?></td>
                                                            
                                                            <td><input type="number" class = "text-center" value="<?php echo $product['quantity'] ;?>" min="1" max="10" readonly></td>
                                                            <td><?php echo $product['product_price'] *  $product['quantity'];?></td>
                                                            <td>
                                                                <form action="/cart-remove/<?php echo $product['product_id']?>" method="POST">
                                                                @csrf
                                                                   <button class="btn btn-sm btn-outline-danger" name="remove_item">remove</button>
                                                                </form>
                                                            </td>
                                                           
                                                           
                                                        </tr>
                                        
                                                 @endforeach
                                                
                                                </thead>
                                                 @else
                                                 <p>no cart</p>
                                                @endif
                                                <thead>
                                                    <tr>
                                                     <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>{{$total}}</th>
                                                    <th></th>
                                                  
                                                    </tr>
                                               
                                            
                                             </tbody>
                                            </table>  
                                        </div>
                                      
                                        <div class="col-md-4">
                                            @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                            <form action="{{route('sales.store')}}" method="post">
                                                @csrf
                                            <div class="card">
                                                <div class="card-header">{{ __('Customer Details') }}</div>
                            
                                                    <div class="card-body">
                                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Customer Name') }}</label>
                                                        <div class="col-md-6">
                                                           <input id="name" type="text" class="form-control" name="cutomer_name" >
                                                        </div>
                                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Customer Phone') }}</label>
                                                    <div class="col-md-6">
                                                        <input id="phone" type="number" class="form-control" name="phone" >
                                                    </div>
                                                </div>
                                            </div>
                                       
                                            
    
    
                                        </div>
                                        <button class="btn btn-primary">checkout</button>
                                    </div>
                                </form>
                              


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
    Cart Products 
@endsection

@section('subtitle')
    Products Added To Cart
@endsection

