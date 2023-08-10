@extends('dashboard')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add New Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Add New Admin</li>
            </ol>
            <a href="{{route('user.index')}}" class="btn btn-sm btn-primary float-right mr-3"> All Admins</a>
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

                <!-- Horizontal Form -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Admin Form</h3>
                        
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{route('user.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                          <div class="form-group row">
                              <label for="name" class="col-sm-3 col-form-label">Name <span class="text-danger">*</span></label>
                              <div class="col-sm-9">
                              <input type="text" name="name" class="form-control"  placeholder="Name">
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="email" class="col-sm-3 col-form-label">Email <span class="text-danger">*</span></label>
                              <div class="col-sm-9">
                              <input type="email" name="email" class="form-control"  placeholder="Email">
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password" class="col-sm-3 col-form-label">Password <span class="text-danger">*</span></label>
                              <div class="col-sm-9">
                              <input type="password" name="password" class="form-control"  placeholder="Password">
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password_confirmation" class="col-sm-3 col-form-label">Confirm Password <span class="text-danger">*</span></label>
                              <div class="col-sm-9">
                              <input type="password" name="password_confirmation" class="form-control"  placeholder="Confirm Password">
                              </div>
                          </div>
    
                    
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        
                        </div>
                        <!-- /.card-footer -->
                    </form>
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