@extends('backend.b-layouts.master')

@section('content')

<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-product-hunt"></i>
               </div>
               <div class="header-title">
                  <h1>Add Category</h1>
                  <small>Add Category</small>
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
                              <a class="btn btn-add " href="{{url('/view-categories')}}"> 
                              <i class="fa fa-list" ></i>View Categories </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" method="post" action="{{url('/addcategory')}}" enctype="multipart/form-data">
                              {{csrf_field()}}
                              <div class="form-group">
                                 <label>Category Name</label>
                                 <input type="text" class="form-control" placeholder="Enter Category Name" name="name" required>
                              </div>
                              
                              <div class="form-group">
                                 <label>Parent Category</label>
                                 <select name="parent_id" class="form-control">
                                 <option value="0">Parent Category</option>
                                 @foreach($levels as $val)
                                 <option value="{{$val->id}} ">{{$val->name}} </option>
                                 @endforeach
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Url</label>
                                 <input type="text" class="form-control" placeholder="Enter URL" name="url" required>
                                      
                              </div>
                              
                              <div class="form-group">
                                 <label>Descriptin</label>
                                 <textarea name="description" rows="5" class="form-control"  placeholder="Description"></textarea>
                                 
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