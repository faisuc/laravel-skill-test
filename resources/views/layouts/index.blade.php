@extends('layouts.master')
@section('title' , 'Home')

@section('content')
	
	<div class="container">
		<h2>Form</h2>
		<form>
			<div class="form-group">
			   	<label for="txtProductName">Product Name</label>
			    <input type="text" class="form-control" id="txtProductName" aria-describedby="Product Name" placeholder="Product Name">
			</div>
			<div class="form-group">
			   	<label for="txtQuantityInStock">Quantity in stock</label>
			    <input type="number" class="form-control" id="txtQuantityInStock" aria-describedby="Quantity in stock" placeholder="Quantity in stock">
			</div>
			<div class="form-group">
			   	<label for="txtPricePerItem">Price per item</label>
			    <input type="text" class="form-control" id="txtPricePerItem" aria-describedby="Price per item" placeholder="Price per item">
			</div>
	 		<button type="submit" class="btn btn-primary" id="form_submit">Submit</button>
		</form>
	</div>


	<div class="container">
	  	<h2>Data</h2>          
	  	<table class="table table-hover">
		    <thead>
		      	<tr>
		        	<th>Product Name</th>
		        	<th>Quantity in stock</th>
		        	<th>Price per item</th>
		        	<th>Datetime submitted</th>
		        	<th>Total value number</th>
		      	</tr>
		    </thead>
		    <tbody>
		      	<tr>
		        	<td>John</td>
		        	<td>Doe</td>
		        	<td>john@example.com</td>
		        	<td>dlkjsal</td>
		        	<td>dlkjsal</td>
		      	</tr>
		    </tbody>
	  	</table>
	</div>

@stop

@section('custom_js')
	
	<script>

		$(document).ready(function()
		{

			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

			$(document).on("click" , "#form_submit" , function()
			{

				var productName = $("#txtProductName").val();
				var quantityInStock = $("#txtQuantityInStock").val();
				var pricePerItem = $("#txtPricePerItem").val();

				var dataString = "productName=" + productName + "&quantityInStock=" + quantityInStock + "&pricePerItem=" + pricePerItem;
				
				$.ajax({
					url : "/form/submit",
					type : "post" ,
					data : dataString ,
					dataType : "json" ,
					success : function(data)
					{
						
					}
				});

				return false;
			});

		});

	</script>

@stop