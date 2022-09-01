@if ( Auth::user()->role == 'admin' || Auth::user()->role == 'buyer')
@extends('admin.layouts.master')
@section('title','Edit Supplier')


@section('admin-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="float-right">Edit Supplier</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('supplier.view')}}">All Supplier</a></li>
              <li class="breadcrumb-item active">edit Supplier</li>
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
          <div class="col-8">

            <div class="card">
                <form action="{{route('supplier.update',$editData->id)}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                          <label for="inputPackage">Company Name</label>
                          <input type="text" id="inputPackage" name="company_name" value="{{$editData->company_name}}" class="form-control">
                        </div>
        
                        <div class="form-group">
                          <label for="inputSpeed">Contact Person Name</label>
                          <input type="text" id="inputSpeed" name="contact_person_name" value="{{$editData->contact_person_name}}" class="form-control">
                        </div>
                        
                        <div class="form-group">
                          <label for="inputcontact_number">Contact Number</label>
                          <input type="text" name="contact_number" value="{{$editData->contact_number}}" id="inputcontact_number"  class="form-control">
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