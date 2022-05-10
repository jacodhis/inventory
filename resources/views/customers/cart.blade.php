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
                        {{-- <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable with Products</h3>
                            </div>

                        </div> --}}
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> All Products:  {{count(session('cart'))}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                               
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
    All Products Added
@endsection

@section('subtitle')
    Products Added
@endsection

