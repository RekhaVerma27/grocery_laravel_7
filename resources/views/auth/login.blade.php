<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Grocery Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{url('frontend/css/bootstrap.css')}}"
 rel="stylesheet" type="text/css" media="all" />
<link href="{{url('frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="{{url('frontend/css/font-awesome.css')}}" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="{{url('frontend/js/jquery-1.11.1.min.js')}}"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{url('frontend/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{url('frontend/js/easing.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){     
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- start-smoth-scrolling -->
</head>
    
<body>
@include('frontend.f-layouts.header')

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
<!-- banner -->
    <div class="banner">

        <div class="w3l_banner_nav_left">
                    <nav class="navbar nav_bottom">
                     <!-- Brand and toggle get grouped for better mobile display -->
                      <div class="navbar-header nav_2">
                          <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                       </div> 
                       <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <!--  -->
                            <ul class="nav navbar-nav nav_1">
                                
                            </ul>
                         </div><!-- /.navbar-collapse -->
                    </nav>
        </div>
        
        
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
                        <div class=""><i class=" "></i>
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
        
@include('frontend.f-layouts.footer')
<!-- Bootstrap Core JavaScript -->
<script src="{{url('frontend/js/bootstrap.min.js')}}"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- here stars scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function() {
            /*
                var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
                };
            */
                                
            $().UItoTop({ easingType: 'easeOutQuart' });
                                
            });
    </script>
<!-- //here ends scrolling icon -->
<script src="{{url('frontend/js/minicart.js')}}"></script>
<script>
        paypal.minicart.render();

        paypal.minicart.cart.on('checkout', function (evt) {
            var items = this.items(),
                len = items.length,
                total = 0,
                i;

            // Count the number of each item in the cart
            for (i = 0; i < len; i++) {
                total += items[i].get('quantity');
            }

            if (total < 3) {
                alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
                evt.preventDefault();
            }
        });

    </script>
    <script src="//cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
      <script>
                                      CKEDITOR.replace( 'content' );
                                 </script>
  <script>
    $(document).ready(function(){
        $("#selSize").change(function(){
                // alert("test");
                var idSize= $(this).val();
                if(idSize==""){
                    return false;
                }
                $.ajax({
                    type: 'get',
                    url: '/get-product-price',
                    data: {idSize:idSize},
                    success: function(resp){
                        // alert(resp);
                        var arr= resp.split('#');
                        $("#getPrice").html(" Product Price: Rs. "+arr[0]);
                        $("#price").val(arr[0]);
                    },error: function(){
                        alert("error");

                    }
                });
            });
        $("#billtoship").click(function(){
            if(this.checked){
                $("#shipping_name").val($("#billing_name").val());
                $("#shipping_address").val($("#billing_address").val());
                $("#shipping_city").val($("#billing_city").val());
                $("#shipping_state").val($("#billing_state").val());
                $("#shipping_country").val($("#billing_country").val());
                $("#shipping_pincode").val($("#billing_pincode").val());
                $("#shipping_mobile_no").val($("#billing_mobile_no").val());
            }else{
                $("#shipping_name").val('');
                $("#shipping_address").val('');
                $("#shipping_city").val('');
                $("#shipping_state").val('');
                $("#shipping_country").val('');
                $("#shipping_pincode").val('');
                $("#shipping_mobile_no").val('');
            }

        });
    
    });
    
  </script>
</body>
</html>




