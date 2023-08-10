@extends('dashboard')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">View Category</li>
            </ol>
            <a href="{{route('category.index')}}" class="btn btn-sm btn-primary float-right mr-3"> All Categories</a>
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
                    <h3 class="card-title">
                    
                    Category Information
                    </h3>
                   
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Category ID <span class="float-right">:</span></dt>
                        <dd class="col-sm-9">{{$category->id}}</dd>
                        <dt class="col-sm-3" >Category Name <span class="float-right">:</span></dt>
                        <dd class="col-sm-9">{{$category->category_name}}</dd>

                    
                    </dl>
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