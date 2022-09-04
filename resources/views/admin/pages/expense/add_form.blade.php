@if ( Auth::user()->role == 'admin' || Auth::user()->role == 'buyer')
@extends('admin.layouts.master')
@section('title','Add Invoice')


@section('admin-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="float-right">Add Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('expense_invoice.view')}}">All Invoice</a></li>
              <li class="breadcrumb-item active">Add Invoice</li>
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
          <div class="col-12">

            <div class="card">
                
        <form action="{{route('expense_invoice.store')}}" method="post">
            @csrf
                
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="invoice_number">Invoice Number</label>
                                <input type="text" readonly id="invoice_number" name="invoice_number" value="{{$invoice_number}}" class="form-control">
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="invoice_date">Invoice Date</label>
                                <input type="date" id="invoice_date" name="invoice_date" value="{{old('invoice_date')}}" class="form-control">
                                </div>
                        </div>
                    </div>

                        <div class="row add_item">
                            <div class="col-md-10">
                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="product_name">Product Name</label>
                                            <input type="text" id="product_name" name="product_name[]" value="{{old('product_name')}}" class="form-control">
                                            </div>
                                    </div>
                                    
        
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="quantity">Quantity</label>
                                            <input type="text" id="quantity" name="quantity[]" value="{{old('quantity')}}" class="form-control">
                                            </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="rate">Unit Price</label>
                                            <input type="text" id="rate" name="unit_price[]"  class="form-control rate">
                                        </div>  
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="box">Unit</label>
                                            <input type="text" id="box" name="unit[]"  class="form-control box">
                                        </div>  
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="amount">Price</label>
                                            <input type="text" id="amount" name="price[]" class="form-control qty1 amount">
                                        </div>  
                                    </div>


                                    


                                    
                                </div>
                            </div>
                            <div class="col-md-2 ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div for="inputprice" class="text-center mt-2">Add More</div>
                                            <a href="" class="btn btn-primary form-control addeventmore"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputprice" class="text-danger">remove</label>
                                            <a href="" class="btn btn-danger form-control removeeventmore"><i class="fa fa-minus"></i></a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            
                        </div>  
                        
                        <div class="row mt-5">
                            <div class="col-md-6"> </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputprice">Total Amount</label>
                                    <input type="text" name="total_amount" id="inputprice" class="form-control total">
                                    </div>
                            </div>
                            <div class="col-md-2"> </div>

                            <div class="col-md-6"> </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="paid_amount">Paid Amount</label>
                                        <input type="text" name="paid_amount" id="paid_amount" class="form-control">
                                    </div>
                            </div>
                            <div class="col-md-2"> </div>

                            <div class="col-md-6"> </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputprice">Due Amount</label>
                                    <input type="text" name="due_amount" id="inputprice" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2"> </div>
                        </div>
                        
                        
                    </div>
                <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
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

  <div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" id="product_name" name="product_name[]" value="{{old('product_name')}}" class="form-control">
                                </div>
                        </div>
                        

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="text" id="quantity" name="quantity[]" value="{{old('quantity')}}" class="form-control">
                                </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="rate">Unit Price</label>
                                <input type="text" id="rate" name="unit_price[]" class="form-control rate">
                            </div>  
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="unit">Unit</label>
                                <input type="text" id="box" name="unit[]"  class="form-control box">
                            </div>  
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" id="amount" name="price[]" value="{{old('price')}}" class="form-control qty1 amount">
                            </div>  
                        </div>


                        


                        
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputprice" class="">Add More</label>
                                <a href="" class="btn btn-primary form-control addeventmore"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputprice" class="text-danger">remove</label>
                                <a href="" class="btn btn-danger form-control removeeventmore"><i class="fa fa-minus"></i></a>
                            </div>
                        </div>


                    </div>
                </div>
                
            </div>  
        </div>
    </div>
  </div>
  
  <script src="{{asset('backend')}}/plugins/jquery/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
        
        var counter = 0;
        $(document).on("click",".addeventmore", function(){
            event.preventDefault();
            var whole_extra_item_add = $("#whole_extra_item_add").html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click",".removeeventmore",function(event){
            event.preventDefault();
            $(this).closest("#delete_whole_extra_item_add").remove();
            counter -=1;
        });

    //     // Unit price multiply and send data to  price

    $('.rate, .box').on('input',function(){
    var rate = parseFloat($('.rate').val()) || 0;
    var box = parseFloat($('.box').val()) || 0;

    $('.amount').val(rate * box);  


    // $(document).on("change", ".qty1", function() {
    //         event.preventDefault();
    //         var sum = 0;
    //         $(".qty1").each(function(){
    //             sum += +$(this).val();
    //         });
    //         $(".total").val(sum);
    //     });
});
        


        // send data price to total price
        // $(document).on("change", ".qty1", function() {
        //     event.preventDefault();
        //     var sum = 0;
        //     $(".qty1").each(function(){
        //         sum += +$(this).val();
        //     });
        //     $(".total").val(sum);
        // });



    });


  </script>







  {{-- <script>
    $(document).ready(function(){
    $('.a1').keyup(calculate);
    $('.a2').keyup(calculate);
});
function calculate(e)
{
    $('.a3').val($('.a1').val() * $('.a2').val());
}
  </script> --}}



@endsection
@endif