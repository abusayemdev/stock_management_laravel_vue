@extends('dashboard')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Home</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">


                  <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$total_users ?? 0}}</h3>

                <p>Admin</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('user.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$total_products ?? 0}}</h3>

                <p>Product</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{route('product.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner text-white">
                <h3>{{$total_stocks_in ?? 0}}</h3>

                <p>Stocks In</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a style="color:white !important;" href="{{route('stocks-history')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $total_return_products ?? 0}}</h3>

                <p>Return Product</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{route('return-product-history')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->


        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recent Products (Limit 10) </h3>
                
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-striped table-responsive">
                <thead>
                
                <tr>
                    <th>#SL</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Retail Price</th>
                    <th>Action</th>
                
                </tr>
                </thead>
                <?php
                $sl=1;
                ?>
                <tbody>
                @foreach($recent_products as $recent_product)
                <tr>
                    <td>{{$sl++}}</td>
                    <td>{{$recent_product->product_name}}</td>
                    <td><img src="{{URL::to($recent_product->image)}}" width="65px" alt=""></td>
                    <td>{{$recent_product->category->category_name}}</td>
                    <td>{{$recent_product->brand->brand_name}}</td>
                    <td>{{$recent_product->retail_price}}</td>
                    <td class="d-inline-flex">
                        <a href="{{route('product.show', $recent_product->id)}}" class="btn btn-sm btn-primary m-1"><i class="fa fa-desktop"></i></a>
                        <a href="{{route('product.edit', $recent_product->id)}}" class="btn btn-sm btn-info  m-1"><i class="fa fa-edit"></i></a>
                        <a href="javascript:;" class="btn btn-sm btn-danger  m-1 delete" data-form-id="product-delete-{{$recent_product->id}}"><i class="fa fa-trash"></i></a>
                        <form action="{{route('product.destroy', $recent_product->id)}}" id="product-delete-{{$recent_product->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        </form>
                    </td>
                
                </tr>
                @endforeach
            
                </tbody>
        
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        


       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection