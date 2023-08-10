@extends('dashboard')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Return Product History</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Return Product History</li>
            </ol>
            <a href="return-product" class="btn btn-sm btn-primary float-right mr-3"> Return Product</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
      
            <div class="col-lg-12">

                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Return Product History List </h3>
                  
                   
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    
                    <tr>
                        <th>#SL</th>
                        <th>Date</th>
                        <th>Product Name</th>
                        <th>Size</th>
                        <th>Quantity</th>
                 
                   
                    </tr>
                    </thead>
                    <?php
                    $sl=1;
                    ?>
                    
                    <tbody>
                    @foreach($return_products as $return_product)
                    <tr>
                        <td>{{$sl++}}</td>
                        <td>{{$return_product->date}}</td>
                        <td>{{$return_product->product->product_name}}</td>
                        <td>{{$return_product->size->size}}</td>
                        <td>{{$return_product->quantity}}</td>
                    
                      
                  
                    </tr>
                    @endforeach
              
                    </tbody>
            
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->




               

                
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection