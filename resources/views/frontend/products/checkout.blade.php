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
					<h2>Bill To</h2>
					<form action="{{url('/checkout')}}" method="post">{{csrf_field()}}
					  <input type="text" name="billing_name" id="billing_name" @if(!empty($userDetails->name)) value="{{$userDetails->name}}" @endif required=" ">
					  <input type="text" name="billing_address" id="billing_address" @if(!empty($userDetails->address)) value="{{$userDetails->address}}" @endif required=" ">
					  <input type="text" name="billing_city" id="billing_city" @if(!empty($userDetails->city)) value="{{$userDetails->city}}" @endif required=" ">
					  <input type="text" name="billing_state" id="billing_state" @if(!empty($userDetails->state)) value="{{$userDetails->state}}" @endif required=" ">
					  <select name="billing_country" id="billing_country" style="width: 225px;height: 45px;" >
  					  	<option value="1">Select Country</option>
  					  	@foreach($countries as $country)
  					  <!-- 	<option value="{{$country->billing_country}}" >{{$country->country_name}}</option> -->
  					  	<option value="{{$country->country_name}}" @if(!empty($userDetails->country) && $country->country_name == $userDetails->country) selected @endif>{{$country->country_name}}</option>
  					  	@endforeach
					  </select><br><br>
					  <input type="text" name="billing_pincode" id="billing_pincode" @if(!empty($userDetails->pincode)) value="{{$userDetails->pincode}}" @endif required=" ">
					  <input type="text" name="billing_mobile_no" id="billing_mobile_no" @if(!empty($userDetails->mobile_no)) value="{{$userDetails->mobile_no}}" @endif required=" ">
					  <div class="form-check">
    					<input type="checkbox" class="form-check-input" id="billtoship">
    					Shipping Address Same as Billing Address
  					  </div>
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
					<h2>Ship To</h2>
					  <input type="text" name="shipping_name" id="shipping_name" @if(!empty($shippingDetails->name)) value="{{$shippingDetails->name}}" @endif required=" ">
					  <input type="text" name="shipping_address" id="shipping_address" @if(!empty($shippingDetails->address)) value="{{$shippingDetails->address}}" @endif required=" " >
					  <input type="text" name="shipping_city" id="shipping_city" @if(!empty($shippingDetails->city)) value="{{$shippingDetails->city}}" @endif required=" ">
					  <input type="text" name="shipping_state" id="shipping_state" @if(!empty($shippingDetails->state)) value="{{$shippingDetails->state}}" @endif required=" ">
					  <select name="shipping_country" id="shipping_country" style="width: 225px;height: 45px;" >
  					  	<option value="1">Select Country</option>
  					  	@foreach($countries as $country)
  					  <!-- 	<option value="{{$country->billing_country}}" >{{$country->country_name}}</option> -->
  					  	<option value="{{$country->country_name}}" @if(!empty($shippingDetails->country) && $country->country_name == $shippingDetails->country) selected @endif>{{$country->country_name}}</option>
  					  	@endforeach
					  </select><br><br>
					  <input type="text" name="shipping_pincode" id="shipping_pincode" @if(!empty($shippingDetails->pincode)) value="{{$shippingDetails->pincode}}" @endif required=" ">
					  <input type="text" name="shipping_mobile_no" id="shipping_mobile_no"@if(!empty($shippingDetails->mobile_no)) value="{{$shippingDetails->mobile_no}}" @endif required=" ">
					  <input type="submit" value="Checkout" id="submit">
					</form>
				  </div>
				</div>
			</div>
	</div>

</div>
<!-- //login -->
</div>
		<div class="clearfix"></div>
<!-- //banner -->
@endsection