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
			<div class="w3l_banner_nav_right_banner3">
				<h3>Best Deals For New Products<span class="blink_me"></span></h3>
			<form name="addtCart" method="post" action="{{url('add-cart')}}">{{csrf_field()}}

			</div>
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
			<div class="agileinfo_single">
<input type="hidden" value="{{$productDetails->id}}" name="product_id">
<input type="hidden" value="{{$productDetails->product_name}}" name="product_name">
<input type="hidden" value="{{$productDetails->product_code}}" name="product_code">
<input type="hidden" value="{{$productDetails->product_color}}" name="product_color">
<input type="hidden" id="price" value="{{$productDetails->price}}" name="price">
				<h5>{{$productDetails->product_name}}</h5>
				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src="{{url('upload/products/'.$productDetails->image)}}" alt=" " class="img-responsive" />
				</div>
				<div class="col-md-8 agileinfo_single_right">
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked>
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>
					<div class="w3agile_description">
						<h4>Description :</h4>
						<p>{{$productDetails->product_description}}</p>
						<ul>
							<li>
								<div class="form-group size-st">
									<label class="size-label">Size</label>
									<select id="selSize" name="size" class="selectpicker show-tick form-control">
									<option value="0">Size</option>
									@foreach($productDetails->attributes as $sizes)
									<option value="{{$productDetails->id}}-{{$sizes->size}}">{{$sizes->size}}</option>
									@endforeach
									</select>
								</div>
							</li>
							<li>
								<div class="form-group quantity-box">
								<label class="control-lebel">Quantity</label>
								<input class="form-control" name="quantity" value="0" min="0" max="20" type="number">	
								</div>
							</li>
						</ul>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							<h4 id="getPrice">Product Price: Rs{{$productDetails->price}}</h4>

						</div>
						<div class="snipcart-details agileinfo_single_right_details">
						<button class="btn hvr-hover" data-fancybox-close="" style="color:red;">Add to Cart</button>	
						</div>
					</div>
				</div>

			<!-- 	<div class="price-box-bar">
					<div class="cart-and-bay-btn">
						<button class="btn hvr-hover" data-fancybox-close="" style="color: white;">Add to Cart</button>
					</div>
				</div> -->
				<div class="clearfix"> </div>
			</div>
		
		</div>
		<div class="clearfix">	
		</div>
		</form>
	</div>
<!-- //banner -->

<!-- brands -->
	<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_popular">
		<div class="container">
			<h3>Popular Brands</h3>
				<div class="w3ls_w3l_banner_nav_right_grid1">
					<h6>food</h6>
					@foreach($featuredProducts as $featuredProduct)
					<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="{{url('frontend/images/offer.png')}}" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.html"><img src="{{url('upload/products/'.$featuredProduct->image)}}" alt=" " class="img-responsive" /></a>
											<p>{{$featuredProduct->product_name}}</p>
											<h4>PKR {{$featuredProduct->price}}</h4>
										</div>
										<div class="snipcart-details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="knorr instant soup" />
													<input type="hidden" name="amount" value="3.00" />
													<input type="hidden" name="discount_amount" value="1.00" />
													<input type="hidden" name="currency_code" value="USD" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
					@endforeach
					<div class="clearfix"> </div>
				</div>
				
		</div>
	</div>

@endsection