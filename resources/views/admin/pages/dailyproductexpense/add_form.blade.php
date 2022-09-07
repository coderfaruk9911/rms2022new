@if ( Auth::user()->role == 'admin' || Auth::user()->role == 'buyer')
@extends('admin.layouts.master')
@section('title','Provide Product')


@section('admin-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="float-right">Provide Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('kitchen_product_provide.view')}}">All Provide Product</a></li>
              <li class="breadcrumb-item active">Provide Product</li>
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
                
        <form action="{{route('kitchen_product_provide.store')}}" method="post">
            @csrf
                
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-4">
                            
                        </div>
                    </div>

                        <div class="row add_item">
                            <div class="col-md-12">

                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="product_name">Product Name</label>
                                            <input type="text" id="search_1" name="product_name[]"   class="form-control search_class typeahead">
                                            </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="product_id">Product Id</label>
                                            <input type="text" id="product_id" name="product_id[]"   class="form-control">
                                            </div>
                                    </div>
        
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="quantity">Quantity</label>
                                            <input type="text" id="quantity" name="quantity[]" value="{{old('quantity')}}" class="form-control">
                                            </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label id="expense_date">Expense Date</label>
                                            <input type="date" id="expense_date" name="expense_date[]"  class="form-control">
                                        </div>  
                                    </div>


                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <div for="inputprice" class="text-center mt-2">Add More</div>
                                            <a href="" class="btn btn-primary form-control addrow"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div> 
                                </div>

                                <div id="showItem"></div>
                                
                            </div>
                            
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



<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
  

  <script>
    	/**When keyup qty Field this function Run*/
	function qty(id)
	{
		var qty = $('#qty_'+id).val();
		var price = $('#price_'+id).val();
		var total = $('#totalamounval').val();
		var result = Number(qty)*Number(price);
		$('#subtotal_'+id).val(result);
		total_price();
	}
	/**When keyup price Field this function Run*/
	function price(id)
	{

		var qty = $('#qty_'+id).val();
		var price = $('#price_'+id).val();
		var total = $('#totalamounval').val();
		var result = Number(qty)*Number(price);
		$('#subtotal_'+id).val(result);
		var totalamount = Number(result)+Number(total);
		$('#totalamounval').val(totalamount);
		total_price();
	}
	/**call every keyup from any function*/
	function total_price()
	{
		var total = 0;
		$('input.subtotal').each(function() {
				total +=Number($(this).val()); 
		});
		$('#totalamounval').val(total);
	}
    /** due amount*/
    $(document).ready(function() {
    $(function() {
    $("#totalamounval, #paid_amount").on("keydown keyup", sub);
    function sub() {
    $("#due_amount").val(Number($("#totalamounval").val()) - Number($("#paid_amount").val()));
    }
    });    

    });

	/*Add Row Item*/
	$(document).ready(function(){                      
		var i = 1;
		$('.addrow').click(function()
			{
                i++;
				html ='';
				html +='<div id="remove_'+i+'" class="row">';
	            html +='<div class="col-md-3"><div class="form-group"><label for="product_name">Product Name</label><input type="text" name="product_name[]"  class="form-control"></div></div>';
	            html +='<div class="col-md-3"><div class="form-group"><label for="product_id">Product Id</label><input type="text" name="product_id[]"  class="form-control"></div></div>';
	            html +='<div class="col-md-3"><div class="form-group"><label for="quantity">Quantity</label><input type="text" id="quantity" name="quantity[]" class="form-control"></div></div>';
	            html +='<div class="col-md-2"><div class="form-group"><label id="expense_date">Expense Date</label><input type="date" id="expense_date" name="expense_date[]"  class="form-control"></div></div>';
                html +='<div class="col-md-1"><div class="form-group"><div for="inputprice" class="text-center mt-2">remove</div><a href="" onclick="return remove('+i+')" class="btn btn-danger form-control "><i class="fa fa-minus"></i></a></div>';
	            html +='</div>';
	            $('#showItem').append(html);

                event.preventDefault();
			});
            
	});
	function remove(id)
	{
        event.preventDefault();
		$('#remove_'+id).remove();
		total_price();
	}
  </script>


@endsection
@endif

