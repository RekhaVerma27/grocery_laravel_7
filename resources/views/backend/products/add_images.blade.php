@extends('backend.b-layouts.master')
@section('title',' Product Attributes')
@section('content')

<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-product-hunt"></i>
               </div>
               <div class="header-title">
                  <h1>Product Attributes</h1>
                  <small>Add Product Images</small>
               </div>
            </section>
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
                           <form class="col-sm-6" method="post" action="{{url('/add-images/'.$productDetails->id)}}" enctype="multipart/form-data">
                              {{csrf_field()}}
            <input type="hidden" name="product_id" value="{{$productDetails->id}}">
                              <div class="form-group">
                                 <label>Product Name:</label> {{$productDetails->product_name}}
                              </div>

                              <div class="form-group">
                                 <label>Product Code:</label> {{$productDetails->product_code}}
                              </div>

                           <div class="form-group">
                           <label>Images:</label>
                           <input type="file" name="image[]" id="image" multiple="multiple">
                            </div>

                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success" value="Add Image">
                                 
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>

<section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>View Attributes</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{url('/addproducts')}} "> <i class="fa fa-plus"></i> Add product
                                 </a>  
                              </div>
                              </div>
                           <div class="table-responsive">
                             <table id="table_id" class="table table-bordered table-striped table-hover">
                           <form method="post" enctype="multipart/form-data" action="{{url('/edit-images/'.$productDetails->id)}}">
                              {{csrf_field()}}
                           <thead>
                              <tr class="info">
                                 <th>Id</th>
                                 <th>Product ID</th>
                                 <th>Image</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                             @foreach($productImages as $productImage)
                              <tr>

<td>{{$productImage->id}}</td>
<td>{{$productImage->product_id}}</td>
<td>
   <img src="{{url('upload/'.$productImage->image)}}" style="width: 80px;">
</td>
   
<td class="center">
   <div class="btn-group">
   
      <a href="{{url('/delete-alt-image/'.$productImage->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> </a>
    </div>  
</td>
                              </tr>
                              @endforeach   
                           </tbody>
                           </form>
                        </table>
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>

         </div>

@endsection