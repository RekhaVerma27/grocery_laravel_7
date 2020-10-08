<footer class="main-footer">
          <strong>Copyright &copy; 2016-2017 <a href="#">Thememinister</a>.</strong> All rights reserved.
         </footer>
      </div>
      <!-- /.wrapper -->
      <!-- Start Core Plugins
         =====================================================================-->
      <!-- jQuery -->
      <script src="{{url('backend/assets/plugins/jQuery/jquery-1.12.4.min.js')}}" type="text/javascript"></script>
     <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
      <!-- jquery-ui --> 
      <script src="{{url('backend/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js')}}" type="text/javascript"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
      minDate:0,
      dateFormat:'yy-mm-dd'
    });
  } );
  </script>
      <!-- Bootstrap -->
      <script src="{{url('backend/assets/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
      <!-- lobipanel -->
      <script src="{{url('backend/assets/plugins/lobipanel/lobipanel.min.js')}}" type="text/javascript"></script>
      <!-- Pace js -->
      <script src="{{url('backend/assets/plugins/pace/pace.min.js')}}" type="text/javascript"></script>
      <!-- SlimScroll -->
      <script src="{{url('backend/assets/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript">    </script>
      <!-- FastClick -->
      <script src="{{url('backend/assets/plugins/fastclick/fastclick.min.js')}}" type="text/javascript"></script>
      <!-- CRMadmin frame -->
      <script src="{{url('backend/assets/dist/js/custom.js')}}" type="text/javascript"></script>
      <!-- End Core Plugins
         =====================================================================-->
      <!-- Start Page Lavel Plugins
         =====================================================================-->
      <!-- ChartJs JavaScript -->
      <script src="{{url('backend/assets/plugins/chartJs/Chart.min.js')}}" type="text/javascript"></script>
      <!-- Counter js -->
      <script src="{{url('backend/assets/plugins/counterup/waypoints.js')}}" type="text/javascript"></script>
      <script src="{{url('backend/assets/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
      <!-- Monthly js -->
      <script src="{{url('backend/assets/plugins/monthly/monthly.js')}}" type="text/javascript"></script>
      <!-- End Page Lavel Plugins
         =====================================================================-->
      <!-- Start Theme label Script
         =====================================================================-->
      <!-- Dashboard js -->
      <script src="{{url('backend/assets/dist/js/dashboard.js')}}" type="text/javascript"></script>
      <!-- End Theme label Script
         =====================================================================-->
         <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
         <script>
           $(document).ready( function () {
           $('#table_id').DataTable({
            "paging":false,
           });

           // Update Product Status
           $(".ProductStatus").change(function(){
              var id = $(this).attr('rel');
              if($(this).prop("checked")==true){
                $.ajax({
                    headers: {
                      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    },
                    type    : 'post',
                    url     : 'update_product_status',
                    data    : {status:'1',id:id},
                    success : function(data){
                      $("#message_success").show();
                      setTimeout(function(){$("#message_success").fadeOut('slow');},2000);
                    },error:function(){
                      alter("Error");
                    }
                });
              }else{
                $.ajax({
                    headers: {
                      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    },
                    type    : 'post',
                    url     : 'update_product_status',
                    data    : {status:'0',id:id},
                    success : function(resp){
                      $("#message_error").show();
                      setTimeout(function(){$("#message_error").fadeOut('slow');},2000);
                    },error:function(){
                      alter("Error");
                    }
                });
              }
           });

            // Update Coupons Status
           $(".CouponStatus").change(function(){
              var id = $(this).attr('rel');
              if($(this).prop("checked")==true){
                $.ajax({
                    headers: {
                      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    },
                    type    : 'post',
                    url     : '/admin/update-coupon-status',
                    data    : {status:'1',id:id},
                    success : function(data){
                      $("#message_success").show();
                      setTimeout(function(){$("#message_success").fadeOut('slow');},2000);
                    },error:function(){
                      alter("Error");
                    }
                });
              }else{
                $.ajax({
                    headers: {
                      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    },
                    type    : 'post',
                    url     : '/admin/update-coupon-status',
                    data    : {status:'0',id:id},
                    success : function(resp){
                      $("#message_error").show();
                      setTimeout(function(){$("#message_error").fadeOut('slow');},2000);
                    },error:function(){
                      alter("Error");
                    }
                });
              }
           });

           // Update Featured Product Status
           $(".FeaturedStatus").change(function(){
              var id = $(this).attr('rel');
              if($(this).prop("checked")==true){
                $.ajax({
                    headers: {
                      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    },
                    type    : 'post',
                    url     : 'update-featurd-product-status',
                    data    : {status:'1',id:id},
                    success : function(data){
                      $("#message_success").show();
                      setTimeout(function(){$("#message_success").fadeOut('slow');},2000);
                    },error:function(){
                      alter("Error");
                    }
                });
              }else{
                $.ajax({
                    headers: {
                      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    },
                    type    : 'post',
                    url     : 'update-featurd-product-status',
                    data    : {status:'0',id:id},
                    success : function(resp){
                      $("#message_error").show();
                      setTimeout(function(){$("#message_error").fadeOut('slow');},2000);
                    },error:function(){
                      alter("Error");
                    }
                });
              }
           });

           // Update Category Status
           $(".CategoryStatus").change(function(){
              var id = $(this).attr('rel');
              if($(this).prop("checked")==true){
                $.ajax({
                    headers: {
                      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    },
                    type    : 'post',
                    url     : 'update_category_status',
                    data    : {status:'1',id:id},
                    success : function(data){
                      $("#message_success").show();
                      setTimeout(function(){$("#message_success").fadeOut('slow');},2000);
                    },error:function(){
                      alter("Error");
                    }
                });
              }else{
                $.ajax({
                    headers: {
                      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    },
                    type    : 'post',
                    url     : 'update_category_status',
                    data    : {status:'0',id:id},
                    success : function(resp){
                      $("#message_error").show();
                      setTimeout(function(){$("#message_error").fadeOut('slow');},2000);
                    },error:function(){
                      alter("Error");
                    }
                });
              }
           });


           // Update Banner Status
           $(".BannerStatus").change(function(){
              var id = $(this).attr('rel');
              if($(this).prop("checked")==true){
                $.ajax({
                    headers: {
                      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    },
                    type    : 'post',
                    url     : 'update_banner_status',
                    data    : {status:'1',id:id},
                    success : function(data){
                      $("#message_success").show();
                      setTimeout(function(){$("#message_success").fadeOut('slow');},2000);
                    },error:function(){
                      alter("Error");
                    }
                });
              }else{
                $.ajax({
                    headers: {
                      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    },
                    type    : 'post',
                    url     : 'update_banner_status',
                    data    : {status:'0',id:id},
                    success : function(resp){
                      $("#message_error").show();
                      setTimeout(function(){$("#message_error").fadeOut('slow');},2000);
                    },error:function(){
                      alter("Error");
                    }
                });
              }
           });

           // Add Remove Dynamically
           $(document).ready(function(){
               var maxField = 10; //Input fields increment limitation
               var addButton = $('.add_button'); //Add button selector
               var wrapper = $('.field_wrapper'); //Input field wrapper
               var fieldHTML = '<div style="display:flex"><input type="text" name="sku[]" id="sku" placeholder="SKU" class="form-control" style="width: 120px; margin-right: 5px;"><input type="text" name="size[]" id="size" placeholder="SIZE" class="form-control" style="width: 120px; margin-right: 5px;" ><input type="text" name="price[]" id="price" placeholder="PRICE" class="form-control" style="width: 120px; margin-right: 5px;" ><input type="text" name="stock[]" id="stock" placeholder="STOCK" class="form-control" style="width: 120px; margin-right: 5px;" ><a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html 
               var x = 1; //Initial field counter is 1
               
               //Once add button is clicked
               $(addButton).click(function(){
                   //Check maximum number of input fields
                   if(x < maxField){ 
                       x++; //Increment field counter
                       $(wrapper).append(fieldHTML); //Add field html
                   }
               });
               
               //Once remove button is clicked
               $(wrapper).on('click', '.remove_button', function(e){
                   e.preventDefault();
                   $(this).parent('div').remove(); //Remove field html
                   x--; //Decrement field counter
               });
           });




           });
         </script>
      <script>
         function dash() {
         // single bar chart
         var ctx = document.getElementById("singelBarChart");
         var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
         labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
         datasets: [
         {
         label: "My First dataset",
         data: [40, 55, 75, 81, 56, 55, 40],
         borderColor: "rgba(0, 150, 136, 0.8)",
         width: "1",
         borderWidth: "0",
         backgroundColor: "rgba(0, 150, 136, 0.8)"
         }
         ]
         },
         options: {
         scales: {
         yAxes: [{
             ticks: {
                 beginAtZero: true
             }
         }]
         }
         }
         });
               //monthly calender
               $('#m_calendar').monthly({
                 mode: 'event',
                 //jsonUrl: 'events.json',
                 //dataType: 'json'
                 xmlUrl: 'events.xml'
             });
         
         //bar chart
         var ctx = document.getElementById("barChart");
         var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
         labels: ["January", "February", "March", "April", "May", "June", "July", "august", "september","october", "Nobemver", "December"],
         datasets: [
         {
         label: "My First dataset",
         data: [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56],
         borderColor: "rgba(0, 150, 136, 0.8)",
         width: "1",
         borderWidth: "0",
         backgroundColor: "rgba(0, 150, 136, 0.8)"
         },
         {
         label: "My Second dataset",
         data: [28, 48, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86],
         borderColor: "rgba(51, 51, 51, 0.55)",
         width: "1",
         borderWidth: "0",
         backgroundColor: "rgba(51, 51, 51, 0.55)"
         }
         ]
         },
         options: {
         scales: {
         yAxes: [{
             ticks: {
                 beginAtZero: true
             }
         }]
         }
         }
         });
             //counter
             $('.count-number').counterUp({
                 delay: 10,
                 time: 5000
             });
         }
         dash();         
      </script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.js"></script>
      <script src="//cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
      <script>
                                      CKEDITOR.replace( 'content' );
                                 </script>
   </body>

<!-- Mirrored from thememinister.com/crm/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jun 2019 11:08:11 GMT -->
</html>

