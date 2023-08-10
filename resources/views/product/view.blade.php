@extends('dashboard')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">View Product</li>
            </ol>
            <a href="{{route('product.index')}}" class="btn btn-sm btn-primary float-right mr-3"> All Products</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
      
            <div class="col-lg-6">

                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                    
                    Product Information
                    </h3>
                   
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped table-responsive">
                        <tr>
                            <td>Product Name</td>
                            <td>{{$product->product_name}}</td>
                        </tr>
                        <tr>
                            <td>Product ID</td>
                            <td>{{$product->id}}</td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td>{{$product->category_name}}</td>
                        </tr>
                        <tr>
                            <td>Brand</td>
                            <td>{{$product->brand_name}}</td>
                        </tr>
                        <tr>
                            <td>SKU</td>
                            <td>{{$product->sku}}</td>
                        </tr>
                        <tr>
                            <td>Cost Price</td>
                            <td>{{$product->cost_price}}</td>
                        </tr>
                        <tr>
                            <td>Retail Price</td>
                            <td>{{$product->retail_price}}</td>
                        </tr>
                        <tr>
                            <td>Year</td>
                            <td>{{$product->year}}</td>
                        </tr><tr>
                            <td>Description</td>
                            <td>{{$product->description}}</td>
                        </tr>

                    </table>
             
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
                
            </div>
            <!-- /.col-md-6 -->


            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                    Product Image
                    </h3>
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body text-center">
                   <img src="{{URL::to($product->image)}}" width="45%" alt="">


                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->


              <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                    Product Stock
                    </h3>
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body text-center">
                   <table class="table table-bordered table-striped table-responsive">
                      <thead>
                        <tr>
                          <th>Size</th>
                          <th>Location</th>
                          <th>Quantity</td>
                        </tr>
                      </thead>
                    
                    <tbody>
                      @foreach($product_stocks as $stocks)
                      <tr>
                         <td>{{$stocks->size ?? ''}}</td>
                         <td>{{$stocks->location ?? ''}}</td>
                         <td>{{$stocks->quantity ?? 0}}</td>
                      </tr>
                      @endforeach
                      </tbody>
                   </table>


                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection