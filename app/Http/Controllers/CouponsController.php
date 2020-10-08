<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupons;

class CouponsController extends Controller
{
    public function addCoupon(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();

    		$coupon = new Coupons;
    		$coupon->coupon_code = $data['coupon_code'];
    		$coupon->amount      = $data['amount'];
    		$coupon->amount_type = $data['amount_type'];
    		$coupon->expiry_date = $data['expiry_date'];
    		$coupon->save();
    		return redirect('/admin/view-coupons')->with('flash_message_success','Coupon has been Added Successfully');
    	}
    	return view('backend.coupons.add_coupon');
    }

    public function viewCoupons(){
    	$coupons = Coupons::get();
    	return view('backend.coupons.view_coupons')->with(compact('coupons'));
    }

    public function updateStatus(Request $request,$id=null)
    {
        $data = $request->all();
        Coupons::where('id',$data['id'])->update(['status'=>$data['status']]);
    }

    public function editCoupon(Request $request,$id = null){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		$coupon =Coupons::find($id);
    		$coupon->coupon_code = $data['coupon_code'];
    		$coupon->amount      = $data['amount'];
    		$coupon->amount_type = $data['amount_type'];
    		$coupon->expiry_date = $data['expiry_date'];
    		$coupon->save();
    		return redirect('/admin/view-coupons')->with('flash_message_success','Coupon has been Updated Successfully');
    	}
    	$couponDetails = Coupons::find($id);
    	return view('backend/coupons/edit_coupon')->with(compact('couponDetails'));
    }

    public function deleteCoupon($id = null){
    	Coupons::where(['id'=>$id])->delete();
    	return redirect('/admin/view-coupons')->with('flash_message_error','Coupon has been Deleted Successfully');
    }
}
