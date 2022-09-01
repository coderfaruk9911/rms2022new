@extends('admin.layouts.master')
@section('title','Receipt Payment')

@section('admin-content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$adminInfo->name}} Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Admin Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

   

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-8">
            <div class="card">
              <div class="card-header">
                {{-- <a href="#" data-toggle="modal" data-target="#modal-lg" class="btn btn-primary float-right">Add New customer</a> --}}
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="{{asset('backend')}}/dist/img/adminLogo.png"
                         alt="User profile picture">
                  </div>
  
                  <h3 class="profile-username text-center">{{$adminInfo->name}}</h3>
  
  
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Email</b> <a class="float-right">{{$adminInfo->email}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>From</b> <a class="float-right">{{$adminInfo->created_at->diffForHumans();}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Role</b> <a class="float-right">{{$adminInfo->role}}</a>
                    </li>
                  </ul>
  
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->


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

@endsection