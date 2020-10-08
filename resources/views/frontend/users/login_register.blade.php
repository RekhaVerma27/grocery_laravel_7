@extends('frontend.f-layouts.master')
@section('dataonly')
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.html">Home</a><span>|</span></li>
				<li>Login & Register</li>
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
		<div class="col-md-4">
<!-- login -->
		<div class="w3_login">
			<h3>New User Sign Up Here</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class=""><i class=""></i>
					<div class="tooltip"></div>
				  </div>
				  <div class="form">
					
					<form action="{{url('/user-register')}}" method="post">{{csrf_field()}}
					<input type="text" name="name" placeholder="Enter Your Name" required=" ">
					  <input type="email" name="email" placeholder="Enter Your Email" required=" ">
					  <input type="password" name="password" placeholder="Enter Your Password" required=" ">
					  <input type="submit" value="Sign Up">
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

<div class="col-md-5">
<!-- login -->
		<div class="w3_login">
			<h3>Already a Member? Just Sign in</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class=""><i class=""></i>
					<div class="tooltip"></div>
				  </div>
				  <div class="form">
			
					<form action="{{url('/user-login')}}" method="post">{{csrf_field()}}
					  <input type="email" name="email" placeholder="Enter Your Email" required=" ">
					  <input type="password" name="password" placeholder="Enter Your Password" required=" ">
					  <input type="submit" value="Login">
					</form>
				  </div>
				  
				  <!-- <div class="cta"><a href="#">Forgot your password?</a></div> -->
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