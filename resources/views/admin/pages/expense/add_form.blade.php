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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="invoice_number">Invoice Number</label>
                                <input type="text" readonly id="invoice_number" name="invoice_number" value="{{$invoice_number}}" class="form-control">
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="invoice_date">Invoice Date</label>
                                <input type="date" id="invoice_date" name="invoice_date" value="{{old('invoice_date')}}" class="form-control">
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Supllier Name:</label>
                                <select class="form-control" id="supplier_id" name="supplier_id">
                                    <option value=""> Select Once</option>
                                    <option value=""> N/A</option>
                                    @foreach ($all_supplier as $row)
                                    <option value="{{$row->id}}">{{$row->company_name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                        </div>
                    </div>

                        <div class="row add_item">
                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="product_name">Product Name</label>
                                            <input type="text" id="product_name" name="product_name[]"   class="form-control">
                                            <div id="product_list"></div>
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
                                            <label>Unit Price</label>
                                            <input type="text" id="qty_1" onkeyup="return qty(1)" name="unit_price[]"  class="form-control rate">
                                        </div>  
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="price_1">Unit</label>
                                            <input type="text" id="price_1" onkeyup="return price(1)" name="unit[]"  class="form-control">
                                        </div>  
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="text" id="subtotal_1" name="price[]" class="form-control subtotal">
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
                                <div class="col-md-12">
                                  <hr>
                                </div>
                            </div>
                            
                        </div>  
                        
                        <div class="row mt-5">
                            <div class="col-md-6"> </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="totalamounval">Total Amount</label>
                                    <input type="text" id="totalamounval" name="total_amount" class="form-control">
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
                                    <input type="text" name="due_amount" id="due_amount" class="form-control">
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



<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script type="text/javascript">

    $('.livesearch').select2({

        placeholder: 'Select Name',

        ajax: {

            url: '{{route("search.product_name")}}',

            dataType: 'json',

            delay: 250,

            processResults: function (data) {

                return {

                    results: $.map(data, function (item) {

                        return {

                            text: item.product_name,

                            id: item.id

                        }

                    })

                };

            },

            cache: true

        }

    });

</script> --}}



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
	            html +='<div class="col-md-3"><div class="form-group"><label for="product_name">Product Name</label><input type="text" name="product_name[]"  class="form-control livesearch"></div></div>';
	            html +='<div class="col-md-2"><div class="form-group"><label for="quantity">Quantity</label><input type="text" id="quantity" name="quantity[]" class="form-control"></div></div>';
	            html +='<div class="col-md-2"><div class="form-group"><label>Unit Price</label><input type="text" id="qty_'+i+'" onkeyup="return qty('+i+')" name="unit_price[]" class="form-control"></div></div>';
	            html +='<div class="col-md-2"><div class="form-group"><label for="price_1">Unit</label><input type="text" id="price_'+i+'" onkeyup="return price('+i+')" name="unit[]"  class="form-control"></div></div>';
                html +='<div class="col-md-2"><div class="form-group"><label>Price</label><input type="text" id="subtotal_'+i+'" name="price[]" class="form-control subtotal"></div>  </div> ';
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


<script type="text/javascript">
    $(document).ready(function(){
        $('#product_name').on('keyup',function () {
            var query = $(this).val();
            $.ajax({
                url:'{{ route('search.product_name') }}',
                type:'GET',
                data:{'product_name':query},
                success:function (data) {
                    $('#product_list').html(data);
                }
            })
        });
        $(document).on('click', 'li', function(){
            var value = $(this).text();
            $('#product_name').val(value);
            $('#product_list').html("");
        });
    });
</script>   



  

{{-- search product name --}}

{{-- <script>
    var path = "{{ url('search-product')  }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { term: query }, function (data) {
                return process(data);
            });
        }
    });
  </script> --}}






  





  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <script type="text/javascript">

    var path = "{{ route('search.product_name') }}";

  

    $( '.search_class').autocomplete({

        source: function( request, response ) {

          $.ajax({

            url: path,

            type: 'GET',

            dataType: "json",

            data: {

               search: request.term

            },

            success: function( data ) {

               response( data );

            }

          });

        },

        select: function (event, ui) {

           $('.search_class').val(ui.item.label);

           console.log(ui.item); 

           return false;

        }
       
      });

  

</script> --}}




<script>



// var path = "{{ url('search-product') }}";

// $('input.typeahead').typeahead({
//     source: function (value, process){
//     return $.get(path, { value: value}, function (data) {
//         return process(toLowerCase(data));
//     });
//     }
// });

    // $(document).ready(function() {
    //     $("#product_name").on("keyup",function(){
    //         var value=  $(this).val();
    //         $.ajax({
    //             url:"{{ route('search.product_name')}}"
    //             type:"GET"
    //             data:{'product_name':value}
    //             success:function(data){
    //                 $($product_list).html(data)
    //             }

    //         });
    //     }); 
    // }); 
    </script>





<script>
$(document).ready(function() {
    $("#disable").on("contextmenu",function(e){
        return false;
    }); 
}); 
</script>

<script>
document.onkeydown = function(e) {
        if (e.ctrlKey && 
            (e.keyCode === 67 || 
             e.keyCode === 86 || 
             e.keyCode === 85 || 
             e.keyCode === 117)) {
            return false;
        } else {
            return true;
        }
};
$(document).keypress("u",function(e) {
  if(e.ctrlKey)
  {
return false;
}
else
{
return true;
}
});
</script>





  
 


@endsection
@endif