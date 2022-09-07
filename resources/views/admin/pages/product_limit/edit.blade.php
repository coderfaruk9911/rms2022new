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
                <form action="{{route('product_limit.update',$editData->id)}}" method="post">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="product_id">Product Name</label>
                            <select class="form-control" id="product_id" name="product_id">
                              <option redonly  value="{{$editData->product_id}}" >{{$editData->product_name}}</option>
                              {{-- @foreach ($StockProduct as $row)
                                  <option value="{{$row->id}}">{{$row->product_name}}</option>  
                              @endforeach  --}}
                            </select>
                          </div>
          
                          <div class="form-group">
                            <label for="limit">Limit Unit</label>
                            <input type="text" id="limit" name="limit" value='{{$editData->limit}}' class="form-control">
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