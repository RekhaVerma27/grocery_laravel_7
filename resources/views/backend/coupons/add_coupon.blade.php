@extends('backend.b-layouts.master')
@section('title','Add Coupon')
@section('content')

<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-product-hunt"></i>
               </div>
               <div class="header-title">
                  <h1>Add Coupons</h1>
                  <small>Add Coupons</small>
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
                              <a class="btn btn-add " href="{{url('/admin/view-coupons')}} "> 
                              <i class="fa fa-list" ></i>View Coupons </a>  
                           </div>
                        </div>
                        <div class="panel-body">
<form class="col-sm-6" method="post" action="{{url('/admin/add-coupon')}}" name="add_coupon" id="add_coupon" enctype="multipart/form-data">
                              {{csrf_field()}}


                              <div class="form-group">
                                 <label>Coupon Code</label>
                                 <input type="text" class="form-control" placeholder="Enter Coupon Code" name="coupon_code" id="coupon_code" required>
                              </div>
                              
                              <div class="form-group">
                                 <label>Amount</label>
                                 <input type="text" class="form-control" placeholder="Enter Amount" name="amount" id="amount" required>
                              </div>


                              <div class="form-group">
                                 <label>Amount Type</label>
                                 <select name="amount_type" id="amount_type" class="form-control">
                                 <option value="Percentage">Percentage</option>
                                 <option value="Fixed">Fixed</option>
                                 </select> 
                              </div>

                              <div class="form-group">
                                 <label>Expiry Date</label>
                                 <input type="text" class="form-control" name="expiry_date" id="datepicker" required>
                              </div>

                              <div class="reset-button">
                                 <input type="submit" class="btn btn-success" value="Add Coupon">
                                 
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