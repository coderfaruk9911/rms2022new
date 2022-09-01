@if ( Auth::user()->role == 'admin' || Auth::user()->role == 'buyer')
@extends('admin.layouts.master')
@section('title','Invoice List')

@section('admin-content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Invoice List</li>
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
                <a href="#" data-toggle="modal" data-target="#modal-default" class="btn btn-primary float-right">Add New Invoice </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Invoice No.</th>
                    <th>Date</th>
                    <th>Product Name</th>
                    <th>Total Amount</th>
                    <th>Paid Amount</th>
                    <th>Due Amount</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($ExpenseList as $key => $row)
                    <tr>
                        <td>{{$row->invoice_number}}</td>
                        <td>{{$row->invoice_date}}</td>
                        <td>{{$row->product_name}}</td>
                        <td>{{$row->total_amount}}</td>
                        <td>{{$row->paid_amount}}</td>
                        <td>{{$row->due_amount}}</td>
                        <td>
                          <a href="{{route('expense_invoice.delete',$row->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                          <a href="{{route('expense_invoice.edit',$row->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>
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
          <h4 class="modal-title">Add New Invoice</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{route('expense_invoice.store')}}" method="post">
            @csrf
        <div class="modal-body">
          
            <div class="card-body">
                <div class="form-group">
                  <label for="inputPackage">Product Name</label>
                  <input type="text" id="inputPackage" name="product_name" value="{{old('product_name')}}" class="form-control" >
                </div>

                <div class="form-group">
                  <label for="invoice_date">Invoice Date</label>
                  <input type="date" id="invoice_date" name="invoice_date" value='{{old('invoice_date')}}' class="form-control">
                </div>
                
                <div class="form-group">
                  <label for="inputprice">Total Amount</label>
                  <input type="text" name="total_amount" value='{{old('total_amount')}}' id="inputprice" class="form-control">
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="paid_amount">Paid Amount</label>
                        <input type="text" name="paid_amount" value='{{old('paid_amount')}}' id="paid_amount" class="form-control">
                      </div>
                      
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputprice">Due Amount</label>
                        <input type="text" name="due_amount" value='{{old('due_amount')}}' id="inputprice" class="form-control">
                      </div>
                </div>
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