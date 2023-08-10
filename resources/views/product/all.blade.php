@extends('dashboard')
@section('content')



<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">All Products</li>
            </ol>
            <a href="{{route('product.create')}}" class="btn btn-sm btn-primary mr-3 float-right"> Add Product</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @toastr_render

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
      
            <div class="col-lg-12">

                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Product List </h3>
                   
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped table-responsive">
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
                    @foreach($products as $product)
                    <tr>
                        <td>{{$sl++}}</td>
                        <td>{{$product->product_name}}</td>
                        <td><img src="{{URL::to($product->image)}}" width="65px" alt=""></td>
                        <td>{{$product->category_name}}</td>
                        <td>{{$product->brand_name}}</td>
                        <td>{{$product->retail_price}}</td>
                        <td class="d-inline-flex">
                            <a href="{{route('product.show', $product->id)}}" class="btn btn-sm btn-primary m-1"><i class="fa fa-desktop"></i></a>
                            <a href="{{route('product.edit', $product->id)}}" class="btn btn-sm btn-info  m-1"><i class="fa fa-edit"></i></a>
                            <a href="javascript:;" class="btn btn-sm btn-danger  m-1 delete" data-form-id="product-delete-{{$product->id}}"><i class="fa fa-trash"></i></a>
                            <form action="{{route('product.destroy', $product->id)}}" id="product-delete-{{$product->id}}" method="post">
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




               

                
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection