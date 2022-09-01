@extends('admin.layouts.master')
@section('title','User List')

@if(Auth::user()->role == 'admin')
@section('admin-content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Error Massage -->
    <div class="container">
      <div class="row d-flex justify-content-center">
          <div class="col-6">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
          </div>
      </div>
  </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <a href="#" data-toggle="modal" data-target="#modal-default" class="btn btn-primary float-right">Create New User</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>User Name</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($allUser as $key => $row)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->role}}</td>
                        <td>{{$row->email}}</td>
                        <td>
                          
                          <a href="{{route('user_management.delete',$row->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                          <a href="{{route('user_management.edit',$row->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>
                          </a>
                          
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
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



  <!-- modal-dialog -->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Create New User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{route('user_management.store')}}" method="post">
            @csrf
        <div class="modal-body">
          
            <div class="card-body">
                <div class="form-group">
                  <label for="inputPackage">Name</label>
                  <input type="text" id="inputPackage" name="name" value='{{old('name')}}' class="form-control" >
                </div>

               
                    <div class="form-group">
                    <label for="inputStatus">Role</label>
                    <select id="inputStatus" name="role" class="form-control custom-select">
                        <option selected disabled>Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="seller">Seller</option>
                            <option value="buyer">Buyer</option>
                    </select>
                    </div>

                <div class="form-group">
                  <label for="inputSpeed">Email</label>
                  <input type="text" id="inputSpeed" name="email" value='{{old('email')}}' class="form-control">
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputprice">Password</label>
                            <input type="password" name="password" id="inputprice" class="form-control">
                          </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputprice">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="inputprice" class="form-control">
                          </div>
                    </div>
                </div>
                
              
                
         
              </div>
            
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Create User</button>
        </div>
        </form>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

@endsection

@endif