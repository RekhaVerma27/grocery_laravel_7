@extends('backend.b-layouts.master')
@section('title','Banner')
@section('content')

<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-eye"></i>
               </div>
               <div class="header-title">
                  <h1>Banners</h1>
                  <small>Banners</small>
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

            <div id="message_success" style="display: none;" class="alert alert-sm alert-success">Status Enabled</div>
            
            <div id="message_error" style="display: none;" class="alert alert-sm alert-danger">Status Disabled</div>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>View Banners</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{url('/addbanner')}} "> <i class="fa fa-plus"></i> Add Banner
                                 </a>  
                              </div>
                              </div>
                           <div class="table-responsive">
                              <table id="table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Id</th>
                                       <th> Name</th>
                                       <th>Sort Order</th>
                                       <th>Image</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 @foreach($banners as $banner)
                                    <tr>
                                    <td>{{$banner->id}}</td>
                                    <td>{{$banner->name}}</td>
                                    <td>{{$banner->sort_order}}</td>
                                    <td>
                                          @if(!empty($banner->image))
                                          <img src="{{url('/upload/banners/'.$banner->image)}}" style="width: 100px;">
                                       </td>
                                       @endif
                                       
                                    <td>
      <input type="checkbox" class="BannerStatus btn btn-success" rel="{{$banner->id}}" data-toggle="toggle" data-on="Enabled" data-of="Disabled" data-onstyle="success" data-offstyle="danger" @if($banner['status']=="1") checked @endif>
      <div id="myElem" style="display: none;" class="alert alert-success">Status Enabled</div>
      </td>
                                  
                                       <td>
                                          <a href="{{url('/edit-banner/'.$banner->id)}}" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></button>
                                          <a href="{{url('/delete-banner/'.$banner->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> </button>
                                       </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->

@endsection