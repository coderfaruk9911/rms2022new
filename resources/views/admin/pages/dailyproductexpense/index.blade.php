@if ( Auth::user()->role == 'admin' || Auth::user()->role == 'buyer')
@extends('admin.layouts.master')
@section('title','Kitchen Provide Product List')

@section('admin-content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kitchen Provide Product List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Kitchen Provide Product</li>
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
                <a href="{{route('kitchen_product_provide.add_form')}}"   class="btn btn-primary float-right">Provide Product</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>quantity</th>
                    <th>Expense Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($provideProductList as $key => $row)
                    <tr>
                        <td>{{$row->product_id}}</td>
                        <td>{{$row->product_name}}</td>
                        <td>{{$row->quantity}}</td>
                        <td>{{$row->expense_date}}</td>
                        <td>
                          <a href="{{route('kitchen_product_provide.delete',$row->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                          <a href="{{route('kitchen_product_provide.edit',$row->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>
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





@endsection
@endif