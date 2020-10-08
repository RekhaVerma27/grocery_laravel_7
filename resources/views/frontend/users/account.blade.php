@extends('frontend.f-layouts.master')
@section('dataonly')
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.html">Home</a><span>|</span></li>
				<li>Account</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
@endsection
@section('data')

<!-- privacy --><div class="container-fluid">
				<div class="row">
				<div class="col-md-8">
		<div class="privacy">
			<div class="privacy1">
				<h3>Account</h3>
				<div class="banner-bottom-grid1 privacy1-grid">
					<ul>
						<a href="{{url('/change-password')}}"><li><i class="glyphicon glyphicon-user" aria-hidden="true"></i></li></a>
						<li>Change Password<span>Change Password</span></li>
					</ul>
					<ul>
						<a href="{{url('/change-address')}}"><li><i class="glyphicon glyphicon-search" aria-hidden="true"></i></li></a>
						<li>Your Address<span>Your Address</span></li>
					</ul>
					<ul>
						<a href="{{url('/orders')}}"><li><i class="glyphicon glyphicon-gift" aria-hidden="true"></i></li></a>
						<li>Your Account<span>Your Account</span></li>
					</ul>
				</div>
			</div>

		</div>
<!-- //privacy -->
</div>
</div>
</div>
@endsection