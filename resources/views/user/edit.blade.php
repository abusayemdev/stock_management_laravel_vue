@extends('dashboard')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Update Admin</li>
            </ol>
            <a href="{{route('user.index')}}" class="btn btn-sm btn-primary float-right"> All Admins</a>
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
                        <h3 class="card-title">Update Admin Form</h3>
                        
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{route('user.update', $edit->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                        <div class="form-group row">
                              <label for="name" class="col-sm-3 col-form-label">Name <span class="text-danger">*</span></label>
                              <div class="col-sm-9">
                              <input type="text" name="name" class="form-control"  value="{{$edit->name}}">
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="email" class="col-sm-3 col-form-label">Email <span class="text-danger">*</span></label>
                              <div class="col-sm-9">
                              <input type="email" name="email" class="form-control"  value="{{$edit->email}}">
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password" class="col-sm-3 col-form-label">Password</label>
                              <div class="col-sm-9">
                              <input type="password" name="password" class="form-control"  placeholder="Enter New Password">
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password_confirmation" class="col-sm-3 col-form-label">Password</label>
                              <div class="col-sm-9">
                              <input type="password" name="password_confirmation" class="form-control"  placeholder="Confirm New Password">
                              </div>
                          </div>
    
                    
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Update</button>
                        
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