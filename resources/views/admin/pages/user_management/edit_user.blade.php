@extends('admin.layouts.master')
@section('title','Edit User')

@if ( Auth::user()->role == 'admin')
@section('admin-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="float-right">Update User Info</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Update User</li>
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
        <div class="row justify-content-center">
          <div class="col-6">

            <div class="card">
                <form action="{{route('user_management.update',$editData->id)}}" method="post">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                  <label for="inputPackage">Name</label>
                  <input type="text" id="inputPackage" name="name" value='{{value($editData->name)}}' class="form-control" >
                </div>

               
                    <div class="form-group">
                    <label for="inputStatus">Role</label>
                    <select id="inputStatus" name="role" class="form-control custom-select">
                        <option value='{{value($editData->role)}}' >{{$editData->role}}</option>
                        <option value="admin">Admin</option>
                        <option value="seller">Seller</option>
                        <option value="buyer">Buyer</option>
                    </select>
                    </div>


                        <button type="submit" class="btn btn-primary float-right">Update</button>
                      </div>
                </form>
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
@endsection

@endif