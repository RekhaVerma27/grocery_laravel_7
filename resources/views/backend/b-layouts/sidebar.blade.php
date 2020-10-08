<!-- Left side column. contains the sidebar -->
         <aside class="main-sidebar">
            <!-- sidebar -->
            <div class="sidebar">
               <!-- sidebar menu -->
               <ul class="sidebar-menu">
                  <li class="active">
                     <a href="index.html"><i class="fa fa-tachometer"></i><span>Dashboard</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>

                  <li class="">
                     <a href="{{'/banners'}}"><i class="fa fa-image"></i><span>Banners</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>

                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-list"></i><span>Categries</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        
                        <li><a href="{{url('/addcategory')}} ">Add Categries</a></li>
                        <li><a href="{{url('/view-categories')}}">View Categries</a></li>
                     </ul>
                  </li>

                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-users"></i><span>Products</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        
                        <li><a href="{{url('/addproducts')}} ">Add Products</a></li>
                        <li><a href="{{url('/viewproducts')}} ">View Products</a></li>
                     </ul>
                  </li>
                  
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-gift"></i><span>Coupons</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        
                        <li><a href="{{url('/admin/add-coupon')}} ">Add Coupon</a></li>
                        <li><a href="{{url('/admin/view-coupons')}}">View Coupons</a></li>
                     </ul>
                  </li>

                  <li class="treeview">
                     <a href="{{url('admin/orders')}}">
                     <i class="pe-7s-cart"></i><span>Orders</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                  </li>

               </ul>
            </div>
            <!-- /.sidebar -->
         </aside>
         <!-- =============================================== -->