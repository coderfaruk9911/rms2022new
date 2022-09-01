@if ( Auth::user()->role == 'admin' || Auth::user()->role == 'buyer')
@extends('admin.layouts.master')
@section('title','Edit Invoice')


@section('admin-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="float-right">Edit Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('supplier.view')}}">All Invoice</a></li>
              <li class="breadcrumb-item active">edit Invoice</li>
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
                
        <form action="{{route('expense_invoice.update',$editData->id)}}" method="post">
            @csrf
                <div class="modal-body">
                
                    <div class="card-body">
                        <div class="form-group">
                        <label for="inputPackage">Product Name</label>
                        <input type="text" id="inputPackage" name="product_name" value="{{$editData->product_name}}" class="form-control" >
                        </div>

                        <div class="form-group">
                        <label for="invoice_date">Invoice Date</label>
                        <input type="date" id="invoice_date" name="invoice_date" value="{{$editData->invoice_date}}" class="form-control">
                        </div>
                        
                        <div class="form-group">
                        <label for="inputprice">Total Amount</label>
                        <input type="text" name="total_amount" value="{{$editData->total_amount}}" id="inputprice" class="form-control">
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="paid_amount">Paid Amount</label>
                                <input type="text" name="paid_amount" value="{{$editData->paid_amount}}" id="paid_amount" class="form-control">
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputprice">Due Amount</label>
                                <input type="text" name="due_amount" value="{{$editData->due_amount}}" id="inputprice" class="form-control">
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary">Update</button>
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