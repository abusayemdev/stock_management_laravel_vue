@extends('dashboard')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Admins</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">All Admins</li>
            </ol>
            <a href="{{route('user.create')}}" class="btn btn-sm btn-primary float-right mr-3"> Add New Admin</a>
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
                    <h3 class="card-title">Admin List </h3>
                   
                    
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                    <thead>
                    
                    <tr>
                        <th>ID</th>
                        <th>Admin Name</th>
                        <th>Admin Email</th>
                        <th>Created At</th>
                        <th>Action</th>
                   
                    </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}} @if(Auth::user()->id == $user->id) (You) @endif  </td>
                        <td>{{$user->email}} @if(Auth::user()->id == $user->id) (You) @endif</td>
                        <td>{{$user->created_at}}</td>
                        <td>
                               

                           @if(Auth::user()->id != $user->id)
                                <a href="javascript:;" class="btn btn-sm btn-danger delete" data-form-id="user-delete-{{$user->id}}"> Delete</a>
                                <form action="{{route('user.destroy', $user->id)}}" id="user-delete-{{$user->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                </form>
                            @else
                            <a href="{{route('user.edit', $user->id)}}" class="btn btn-sm btn-info"> Edit</a>
                            @endif
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