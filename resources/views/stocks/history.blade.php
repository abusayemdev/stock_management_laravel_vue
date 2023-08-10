@extends('dashboard')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Stocks History</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Stocks History</li>
            </ol>
            <a href="stocks" class="btn btn-sm btn-primary float-right mr-3"> Stocks Manage</a>
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
                    <h3 class="card-title">Stocks History List </h3>
                  
                   
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
                        <th>Status</th>
                   
                    </tr>
                    </thead>
                    <?php
                    $sl=1;
                    ?>
                    
                    <tbody>
                    @foreach($stocks as $stock)
                    <tr>
                        <td>{{$sl++}}</td>
                        <td>{{$stock->date}}</td>
                        <td>{{$stock->product->product_name}}</td>
                        <td>{{$stock->size->size}}</td>
                        <td>{{$stock->quantity}}</td>
                        <td>{{strtoupper($stock->status)}}</td>
                      
                  
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