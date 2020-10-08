@extends('frontend.f-layouts.master')
@section('dataonly')
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.html">Account</a><span>|</span></li>
				<li>Change Password</li>
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
			<h3>Change Password</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
					<div class="tooltip">Click Me</div>
				  </div>
				  <div class="form">
					<h2>Change Your Password Here</h2>
					<form action="{{url('/change-password')}}" method="post">{{csrf_field()}}
					  <input type="hidden" name="old_password" id="old_password" placeholder="Enter Your Current Password" required=" ">
					  <input type="password" name="current_password" id="current_password" placeholder="Enter Your Current Password" required=" ">
					  <input type="password" name="new_password" placeholder="Enter Your New Password" required=" ">
					  <input type="submit" value="Save">
					</form>
				  </div>
				  <div class="form">
					<h2>Create an account</h2>
					<form action="#" method="post">
					  <input type="text" name="Username" placeholder="Username" required=" ">
					  <input type="password" name="Password" placeholder="Password" required=" ">
					  <input type="email" name="Email" placeholder="Email Address" required=" ">
					  <input type="text" name="Phone" placeholder="Phone Number" required=" ">
					  <input type="submit" value="Register">
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