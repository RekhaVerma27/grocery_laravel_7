@extends('frontend.f-layouts.master')
@section('dataonly')
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.html">Home</a><span>|</span></li>
				<li>Single Page</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
@endsection
@section('data')

<div class="w3l_banner_nav_right">
<!-- about -->
<div class="privacy about">

	 @if(Session::has('flash_message_error'))
            <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>   
            </button>
               <strong>{{session('flash_message_error')}}</strong>
            </div>
            @endif
            @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>   
            </button>
               <strong>{{session('flash_message_success')}}</strong>
            </div>
            @endif

	<h3>Chec<span>kout</span></h3>
	
  <div class="checkout-right">
			<h4>Your shopping cart contains: <span>3 Products</span></h4>
		<table class="timetable_sub">
			<thead>
				<tr>
					<th>SL No.</th>	
					<th>Product</th>
					<th>Quantity</th>
					<th>Product Name</th>
				
					<th>Price</th>
					<th>Remove</th>
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
						<a href="{{url('/cart/update-quantity/'.$cart->id.'/1')}}" style="font-size: 25px;">+</a>                           
							<!-- <div class="entry value-minus">&nbsp;</div> -->
							<div class="entry value"><span>{{$cart->quantity}}</span></div>
							<!-- <div class="entry value-plus active">&nbsp;</div> -->
							@if($cart->quantity>1)
							<a href="{{url('/cart/update-quantity/'.$cart->id.'/-1')}}" style="font-size: 25px;">-</a> 
							@endif
						</div>
					</div>
				</td>
				<td class="invert">{{$cart->product_name}}</td>
				
				<td class="invert">{{$cart->price}}</td>
				<td class="invert">
					<div class="rem">
						<a href="{{url('/cart/delete-product/'.$cart->id)}}">
							<div class="close1"> </div>
						</a>	
					</div>

				</td>
			</tr>
			<?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
			@endforeach
		</tbody>
	</table>
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

		<div class="col-lg-6 col-sm-6">
			<div class="update-box"><a href="{{url('/checkout')}}">
				<input type="submit" value="CheckOut" name="" style="margin: 40px; background: red; color: white; "></a>
			</div>
		</div>
		
	</div>
	<div class="checkout-left">	
		<div class="col-md-4 checkout-left-basket">
			
			@if(!empty(Session::get('CouponAmount')))
			<ul>
				<li>Sub total<i>-</i> <span><?php echo $total_amount; ?></span></li>
				<li>Coupon discount(-) <i>-</i> <span>PKR <?php echo Session::get('CouponAmount'); ?> </span></li>
				<li> Grand Total <i>-</i> <span>PKR <?php echo $grand_total= $total_amount - Session::get('CouponAmount'); ?> </span></li>
				@else
				<li>Grand_Total <i>-</i> <span>PKR <?php echo $total_amount; ?> </span></li>
				@endif
			</ul>
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