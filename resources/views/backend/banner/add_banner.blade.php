@extends('backend.b-layouts.master')
@section('title','Add banner')
@section('content')

<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-image"></i>
               </div>
               <div class="header-title">
                  <h1>Add banner</h1>
                  <small>Add banner</small>
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
                              <a class="btn btn-add " href="{{url('/banners')}} "> 
                              <i class="fa fa-list" ></i>View Banners </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" method="post" action="{{url('/addbanner')}}" enctype="multipart/form-data">
                              {{csrf_field()}}

                              <div class="form-group">
                                 <label> Name</label>
                                 <input type="text" class="form-control" placeholder="Enter Banner Name" name="name" required>
                              </div>
                              
                              <div class="form-group">
                                 <label>Text Style</label>
                                 <input type="text" class="form-control" placeholder="Enter Text Style" name="text_style" required>
                              </div>
                              <div class="form-group">
                                 <label>Content</label>
                                      <textarea name="content" rows="5" class="form-control"  placeholder="Description"></textarea>
                              </div>
                              
                              <div class="form-group">
                                 <label>Link</label>
                                 <input type="text" class="form-control" placeholder="Enter link" name="link" required>
                              </div>

                                <div class="form-group">
                                 <label>Sort Order</label>
                                 <input type="text" class="form-control" placeholder="Enter link" name="sort_order" required>
                              </div>

                              <div class="form-group">
                                 <label>Banner Image</label>
                                 <input type="file" name="image">
                                 
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