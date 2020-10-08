@extends('frontend.f-layouts.master')
@section('dataonly')
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.html">Account</a><span>|</span></li>
				<li>Change Address</li>
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
	<div class="row">
		<div class="col-md-8">
<!-- login -->
		<div class="w3_login">
			<h3>Change Address</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
					<div class="tooltip">Click Me</div>
				  </div>
				  <div class="form">
					<h2>Change Your Address Here</h2>
					<form action="{{url('/change-address')}}" method="post">{{csrf_field()}}
					  <input type="text" name="name" value="{{$userDetails->name}}" placeholder="Enter Your Name" required=" ">
					  <input type="text" name="address" value="{{$userDetails->address}}" placeholder="Enter Your Address" required=" ">
					  <input type="text" name="city" value="{{$userDetails->city}}" placeholder="Enter Your City" required=" ">
					  <input type="text" name="state" value="{{$userDetails->state}}" placeholder="Enter Your State" required=" ">
					  <select name="country" id="country" style="width: 321px;height: 48px;">
					  	<option value="1">Select Your Country</option>
					  	@foreach($countries as $country)
					  	<option value="{{$country->country_name}}" @if( $country->country_name == $userDetails->country) selected @endif>{{$country->country_name}}</option>
					  	@endforeach
					  </select>
					  <br><br>
					  <input type="text" name="pincode" value="{{$userDetails->pincode}}" placeholder="Enter Your Pincode" required=" ">
					  <input type="text" name="mobile_no" value="{{$userDetails->mobile_no}}" placeholder="Enter Your Mobile Number" required=" ">

					  <input type="submit" value="Save">
					</form>
				  </div>

				  
				</div>
			</div>
			<script>
				$('.toggle').click(function(){
				  // Switches the Icon
				  $(this).children('i').toggleClass('fa-pencil');
				  // Switches the forms  
				  $('.form').animate({
					height: "toggle",
					'padding-top': 'toggle',
					'padding-bottom': 'toggle',
					opacity: "toggle"
				  }, "slow");
				});
			</script>
		</div>
<!-- //login -->
</div>


</div>
</div>
@endsection