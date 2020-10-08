@extends('frontend.f-layouts.master')
@section('dataonly')
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.html">Home</a><span>|</span></li>
				<li>Checkout</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
@endsection
@section('data')

<div class="container-fluid">
	            

<!-- banner -->
<div class="banner">
<!-- login -->
<div class="col-md-4">
	<div class="w3_login">
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle">
				  </div>
				  <div class="form">
					<h2>Billing Address</h2>
						<label>Name:</label>
					  {{$userDetails->name}}
					  <br><br>
					  <label>Address:</label>
					 {{$userDetails->address}}
					 <br><br>
					 <label>City:</label>
					  {{$userDetails->city}}
					  <br><br>
					  <label>State:</label>
					  {{$userDetails->state}}
					  <br><br>
					  <label>Country</label>
					  {{$userDetails->country}}
					  <br><br>
					  <label>Pincode:</label>
					  {{$userDetails->pincode}}
					  <br><br>
					  <label>Mobile Number:</label>
					  {{$userDetails->mobile_no}}
					  <br><br>
					  
				  </div>
				</div>
			</div>
	</div>
</div>
<div class="col-md-4">
	<div class="w3_login">
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle">
				  </div>
				  <div class="form">
					<h2>Shipping Details</h2>
					<label>Name:</label>
					  {{$shippingDetails->name}}
					  <br><br>
					  <label>Address:</label>
					  {{$shippingDetails->address}}
					  <br><br>
					  <label>City:</label>
					   {{$shippingDetails->city}}
					  <br><br>
					  <label>State:</label>
					   {{$shippingDetails->state}}
					  <br><br>
					  <label>Country:</label>
					  {{$shippingDetails->country}}
					  <br><br>
					  <label>Pincode:</label>
					  {{$shippingDetails->pincode}}
					  <br><br>
					  <label>Mobile Number:</label>
					   {{$shippingDetails->mobile_no}}
					  <br><br>
					 
					
				  </div>
				</div>
			</div>
	</div>

</div>
<!-- //login -->
</div>
		<div class="clearfix"></div>
<!-- //banner -->


	
  <div class="w3l_banner_nav_right">
<!-- about -->
<div class="privacy about">


	<!-- <h3>Chec<span>kout</span></h3> -->
	
  <div class="checkout-right">
			<!-- <h4>Your shopping cart contains: <span>3 Products</span></h4> -->
		<table class="timetable_sub">
			<thead>
				<tr>
					<th>SL No.</th>	
					<th>Product</th>
					<th>Quantity</th>
					<th>Product Name</th>
				
					<th>Price</th>
					
				</tr>
			</thead>
			<tbody>
				<?php $total_amount = 0; ?>
					<?php $grand_total = 0; ?>
			@foreach($userCart as $cart)
			<tr class="rem1">
				<td class="invert">{{$cart->id}}</td>
				<td class="invert-image">
					<a href="single.html">
						<img src="{{url('/upload/products/'.$cart->image)}}"  alt=" " class="img-responsive" style="height: 140px; width: 140px;" >
					</a>
					<p>Code : {{$cart->product_code}} </p>  <p> Size : {{$cart->size}}</p>
					
				</td>
				<td class="invert">
					 <div class="quantity"> 
						<div class="quantity-select">
						<!-- <a href="{{url('/cart/update-quantity/'.$cart->id.'/1')}}" style="font-size: 25px;">+</a> -->                           
							<!-- <div class="entry value-minus">&nbsp;</div> -->
							<div class="entry value"><span>{{$cart->quantity}}</span></div>
							<!-- <div class="entry value-plus active">&nbsp;</div> -->
							<!-- @if($cart->quantity>1)
							<a href="{{url('/cart/update-quantity/'.$cart->id.'/-1')}}" style="font-size: 25px;">-</a> 
							@endif -->
						</div>
					</div>
				</td>
				<td class="invert">{{$cart->product_name}}</td>
				
				<td class="invert">{{$cart->price}}</td>
				
			</tr>
			<?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
			@endforeach
		</tbody></table>
	</div>
	<!-- coupon -->
	<div class="row my-5">
		<div class="col-lg-6 col-sm-6">

			<div class="coupon-box">
				<form action="{{url('/cart/apply-coupon')}}" method="post">{{csrf_field()}}
				<div class="input-group input-group-sm" style="margin: 42px;">
					<input class="form-control" placeholder="Enter your coupon code " type="text" name="coupon_code" style="height: 39px">
					
				</div>
				<button class="btn btn-theme" type="submit" style="background: red; color: white; position: relative; margin-left: 207px; margin-top: -152px;">Apply Coupon</button>
				</form>
			</div>
		</div>

		
		
	</div>
	<div class="checkout-left">	
		<div class="col-md-4 checkout-left-basket">
			
			@if(!empty(Session::get('CouponAmount')))
			<ul>
				<li>Sub total<i>-</i> <span><?php echo $total_amount; ?></span></li>
				<li>Shipping Cost(+) <i>-</i> <span>PKR 0 </span></li>
				<li>Coupon discount (-) <i>-</i> <span>PKR <?php echo Session::get('CouponAmount'); ?> </span></li>
				<li>Grand Total <i>-</i> <span>PKR <?php echo $grand_total= $total_amount - Session::get('CouponAmount'); ?> </span></li>
				@else
				<li>Sub total<i>-</i> <span><?php echo $total_amount; ?></span></li>
				<li>Shipping Cost(+) <i>-</i> <span>PKR 0 </span></li>
				<li>Coupon discount (-) <i>-</i> <span>PKR 0</span></li>
				<li>Grand Total <i>-</i> <span>PKR <?php echo $total_amount; ?> </span></li>
				@endif
			</ul>
		</div>

		<!-- Form -->
		<div class="col-md-8 address_form_agile">
							  <!-- <h4>Payment Method</h4> -->
						

										<div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-2" style="display:block">
                                     <div class="vertical_post">
									  <form name="paymentForm" id="paymentForm" action="{{url('/place-order')}}" method="post">{{csrf_field()}}
									  	<input type="hidden" value="{{$grand_total}}" name="grand_total">
										<h5>Payment Method</h5>
										<div class="">								
											<div class="check_box_one">
											 <div class="radio_one">
											 <label>
											 	<input type="radio" name="payment_method" value="cod" checked="">Cash on Delivery</label>
											 	 </div>
											 </div>

											<div class="check_box_one">
											 <div class="radio_one">
											  <label>
											  	<input type="radio" value="paypal" class="paypal" name="payment_method">Stripe</label> 
											  </div>
											</div>

											<div class="check_box_one">
											 <div class="radio_one">
											  <label>
											  	<input type="radio" name="radio"><i></i>Paytm</label>
											  	 </div>
											  	</div>

											  	<div class="check_box_one">
											 <div class="radio_one">
											  <label>
											  	<input type="radio" name="radio"><i></i>Insamojo</label>
											  	 </div>
											  	</div>	

											  	<div class="check_box_one">
											 <div class="radio_one">
											  <label>
											  	<input type="radio" name="radio"><i></i>Razorpay</label>
											  	 </div>
											  	</div>		
											
										</div>

										<input type="submit" onclick="return selectPaymentMethod();" value="PAY NOW">
									</form>
								</div>
                </div>
								
							</div>


<div class="clearfix"> </div>

</div>

</div>
<!-- //about -->
</div>
<div class="clearfix"></div>
</div>
<!-- //banner -->
	

@endsection