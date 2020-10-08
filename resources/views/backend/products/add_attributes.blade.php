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
                  <small>Add Product Attributes</small>
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
                           <form class="col-sm-6" method="post" action="{{url('/add-attributes/'.$productDetails->id)}}" enctype="multipart/form-data">
                              {{csrf_field()}}

                              

                              <div class="form-group">
                                 <label>Product Name:</label> {{$productDetails->product_name}}
                                 <br>
                                 <label>Product Code:</label> {{$productDetails->product_code}}
                                 
                              </div>

                              <div class="form-group">
                                 <div class="field_wrapper">
                                     <div style="display:flex;">
      <input type="text" name="sku[]" id="sku" placeholder="SKU" class="form-control" style="width: 120px; margin-right: 5px;">
      <input type="text" name="size[]" id="size" placeholder="SIZE" class="form-control" style="width: 120px; margin-right: 5px;" >
      <input type="text" name="price[]" id="price" placeholder="PRICE" class="form-control" style="width: 120px; margin-right: 5px;" >
      <input type="text" name="stock[]" id="stock" placeholder="STOCK" class="form-control" style="width: 120px; margin-right: 5px;" >
      <a href="javascript:void(0);" class="add_button" title="Add Field">Add</a>
                                     </div>
                                 </div>
                              </div>
                              
                             <!--  <div class="form-group">
                                 <label>Category</label>
                                 <input type="text" class="form-control" placeholder="Enter Category" name="category" required>
                              </div>
                              <div class="form-group">
                                 <label>Product Description</label>
                                      <textarea name="product_description" rows="5" class="form-control"  placeholder="Description"></textarea>
                              </div>
                              
                              <div class="form-group">
                                 <label>Product Price</label>
                                 <input type="text" class="form-control" placeholder="Enter product Price" name="product_price" required>
                              </div>

                              <div class="form-group">
                                 <label>Image</label>
                                 <input type="file" name="image">
                                 
                              </div> -->
                              
                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success" value="Add Attributes">
                                 
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>

            <!-- view Attributes -->
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
                           <form method="post" enctype="multipart/form-data" action="{{url('/edit-attributes/'.$productDetails->id)}}">
                              {{csrf_field()}}
                           <thead>
                              <tr class="info">
                                 <th>Category ID</th>
                                <!--  <th>Product ID</th> -->
                                 <th>SKU</th>
                                 <th>Size</th>
                                 <th>Price</th>
                                 <th>Stock</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                             @foreach($productDetails->attributes as $attribute)
                              <tr>
<td style="display: none;"><input type="hidden" name="attr[]" value="{{$attribute->id}}">{{$attribute->id}}</td>
<td>{{$attribute->id}}</td>
<!-- <td>{{$attribute->product_id}}</td> -->
<td><input type="text" name="sku[]" value="{{$attribute->sku}}" style="text-align: center;"></td>
<td><input type="text" name="size[]" value="{{$attribute->size}}" style="text-align: center;"></td>
<td><input type="text" name="price[]" value="{{$attribute->price}}" style="text-align: center;"></td>
<td><input type="text" name="stock[]" value="{{$attribute->stock}}" style="text-align: center;"></td>   
<td class="center">
   <div class="btn-group">
   <input type="submit" value="Update" name="update" class="btn btn-success" style="height: 30px;padding-top: 4px;">
      <a href="{{url('/delete-attribute/'.$attribute->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> </a>
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
            <!-- /.content -->
         </div>

@endsection