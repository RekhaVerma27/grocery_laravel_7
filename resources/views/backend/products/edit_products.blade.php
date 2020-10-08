@extends('backend.b-layouts.master')

@section('content')

<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-product-hunt"></i>
               </div>
               <div class="header-title">
                  <h1>Edit Product</h1>
                  <small>Edit Products</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="{{url('/viewproducts')}} "> 
                              <i class="fa fa-list" ></i>View products </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" method="post" action="{{url('/editproducts/'.$productDetails->id)}}" enctype="multipart/form-data">
                              {{csrf_field()}}

                              <div class="form-group">
                                 <label>Under Category</label>
                                 <select name="category_id" class="form-control">
                                    <?php echo $categories_dropdown; ?>
                                 </select> 
                              </div>

                              <div class="form-group">
                                 <label>Product Name</label>
                                 <input type="text" class="form-control" value="{{$productDetails->product_name}}" name="product_name" required>
                              </div>
                              
                              <!-- <div class="form-group">
                                 <label>Category</label>
                                 <input type="text" class="form-control" value="{{$productDetails->category}}" name="category" required>
                              </div> -->
                              <div class="form-group">
                                 <label>Product Description</label>
                                      <textarea name="product_description" rows="5" class="form-control"  placeholder="Description">{{$productDetails->product_description}}</textarea>
                              </div>
                              
                              <div class="form-group">
                                 <label>Product Price</label>
                                 <input type="text" class="form-control" value="{{$productDetails->product_price}}" name="product_price" required>
                              </div>

                              <div class="form-group">
                                 <label>Image</label>
                                 <input type="file" name="image">
                                 <input type="hidden" name="current_image" value="{{$productDetails->image}}">
                                 @if(!empty($productDetails->image))
                                 <img style="width:100px;margin-top: 10px; " src="{{url('/upload/'.$productDetails->image)}}">
                                 @endif
                                 
                              </div>
                              
                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success">
                                 
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>

@endsection