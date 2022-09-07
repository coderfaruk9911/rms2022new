@if ( Auth::user()->role == 'admin' || Auth::user()->role == 'buyer')
@extends('admin.layouts.master')
@section('title','Product Limit List')

@section('admin-content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Limit List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Product Limit</li>
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
                <a href="#" data-toggle="modal" data-target="#modal-default" class="btn btn-primary float-right">Set New Product Limit </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Product Name</th>
                    <th>Limit</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($Productlimits as $key => $row)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$row->product_name}}</td>
                        <td>{{$row->limit}}</td>
                        <td>
                          <a href="{{route('product_limit.delete',$row->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                          <a href="{{route('product_limit.edit',$row->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>
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
          <h4 class="modal-title">Add Product Limit</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{route('product_limit.store')}}" method="post">
            @csrf
        <div class="modal-body">
          
            <div class="card-body">
                <div class="form-group">
                  <label for="product_id">Product Name</label>
                  <select class="form-control" id="product_id" name="product_id">
                    <option selected value="" disabled>Select Product...</option>
                    @foreach ($StockProduct as $row)
                        <option value="{{$row->id}}">{{$row->product_name}}</option>  
                    @endforeach
                   
                    
                  </select>
                </div>

                <div class="form-group">
                  <label for="limit">Limit Unit</label>
                  <input type="text" id="limit" name="limit" value='{{old('limit')}}' class="form-control">
                </div> 
              </div>
            
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

@endsection
@endif