@extends('dashboard')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">

 
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Categories</h1>
            
         
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">All Categories</li>
            </ol>
            <a href="{{route('category.create')}}" class="btn btn-sm btn-primary float-right mr-3"> Add Category</a>
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
                    <h3 class="card-title">Category List </h3>
                   
                    
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    
                    <tr>
                        <th>ID</th>
                        <th>category Name</th>
                        <th>Action</th>
                   
                    </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>
                            <a href="{{route('category.show', $category->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>
                            <a href="{{route('category.edit', $category->id)}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                            <a href="javascript:;" class="btn btn-sm btn-danger delete" data-form-id="category-delete-{{$category->id}}"><i class="fa fa-trash"></i> Delete</a>
                            <form action="{{route('category.destroy', $category->id)}}" id="category-delete-{{$category->id}}" method="post">
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