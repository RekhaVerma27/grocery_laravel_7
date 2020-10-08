<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Image;
use App\Product2;
use App\Category;
use App\ProductsAttributes;
use App\ProductsImages;
use App\Coupons;
use DB;
use Session;
use Auth;
use App\User;
use App\Country;
use App\DeliveryAddress;
use App\Orders;
use App\OrdersProduct;

class Product2Controller extends Controller
{
    public function addproducts(Request $request)
    {

    	if($request->isMethod('post'))
        {
         $data = $request->all();
        //echo "<pre>"; print_r($data); die; 
        $product = new Product2();

        $product->category_id   = $data['category_id'];
        $product->product_name  = $data['product_name'];
         $product->product_code = $data['product_code'];
       
        
        
        
        if(!empty($data['product_description'])){

            $product->product_description  = $data['product_description'];
        }

        else{
            $product->product_description = '';
        }

        $product->product_price  = $data['product_price'];

        if($request->hasfile('image')){

            echo $img_tmp = input::file('image');
            if($img_tmp->isValid()){

                $extension = $img_tmp->getClientOriginalExtension();
                $filename = rand(111,99999).'.'.$extension;
                $img_path = 'upload/products/'.$filename;

                image::make($img_tmp)->resize(500,500)->save($img_path);

                $product->image = $filename;
            }
        }

        $product->save();

        return redirect('/viewproducts');


        }

        $categories = Category::where(['parent_id'=>0])->get();

        $categories_dropdown = "<option value = '' selected disabled>Select</option>";

        foreach ($categories as $cat) {
            $categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();

        foreach ($sub_categories as $sub_cat) {
                $categories_dropdown .="<option value='".$sub_cat->id."'>&nbsp;--&nbsp".$sub_cat->name."</option>";
            }
        } 

    return view('backend.products.add_products')->with(compact('categories_dropdown'));
    }



    public function view_products()
    {
        $products = Product2::get();
    	return view('backend.products.view_products')->with(compact('products'));
    }

    public function edit_products(Request $request, $id=null)
    {
        if($request->isMethod('post')){
            $data = $request->all();

         //upload image

        if($request->hasfile('image')){

            echo $img_tmp = input::file('image');
            if($img_tmp->isValid()){

                $extension = $img_tmp->getClientOriginalExtension();
                $filename = rand(111,99999).'.'.$extension;
                $img_path = 'upload/products/'.$filename;

                image::make($img_tmp)->resize(500,500)->save($img_path);

                
            }
        }else{
                $filename = $data['current_image'];
            }
            if(empty($data['product_description'])){
                $data['product_description'] = '';
            }
            Product2::where(['id'=>$id])->update(['product_name'=>$data['product_name'],'category_id'=>$data['category_id'],'product_description'=>$data['product_description'],'product_price'=>$data['product_price'],'image'=>$filename]);
            return redirect('/viewproducts');
        }
        $productDetails = Product2::where(['id'=>$id])->first();

        // category dropdwon code

        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value = '' selected disabled>Select</option>";
        foreach ($categories as $cat) {
            if($cat->id==$productDetails->category_id){
                $selected = "selected";
            }else{
                $selected = "";
            }
            $categories_dropdown .="<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
        }

        // code for sub categories

        $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
        foreach ($sub_categories as $sub_cat) {
            if($cat->id==$productDetails->category_id){
                $selected = "selected";
            }else{
                $selected = "";
            }
            $categories_dropdown .="<option value='".$sub_cat->id."' ".$selected.">&nbsp;--&nbsp".$sub_cat->name."</option>";
        }

        return view('backend.products.edit_products')->with(compact('productDetails','categories_dropdown'));
    
}

   
    public function delete_products($id)
    {
        $product = Product2::find($id);
        $deleted = $product->delete();

        if($deleted)
            {
                return redirect('/viewproducts');
            }
    }

    public function updateStatus(Request $request,$id=null)
    {
        $data = $request->all();
        Product2::where('id',$data['id'])->update(['status'=>$data['status']]);
    }

    public function singleProduct($id=null)
    {
        $productDetails = Product2::where('id',$id)->first();
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        $featuredProducts = Product2::where(['featured_products'=>1])->get();
        return view('frontend.singleProduct',compact('productDetails','categories','featuredProducts'));

    }

    public function addAttributes(Request $request,$id=null)
    {
        $productDetails = Product2::with('attributes')->where(['id'=>$id])->first();
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;

            foreach ($data['sku'] as $key=>$val) {
                if(!empty($val)){
                    // prevent duplicate sku Record
                    $attrCountSKU = ProductsAttributes::where('sku',$val)->count();
                    if($attrCountSKU>0){
                        return redirect('/add-attributes/'.$id)->with('flash_message_error','sku is already exist please select another sku');
                    }
 // prevent duplicate Size Record
 $attrCountSizes = ProductsAttributes::where(['product_id'=>$id, 'size'=>$data['size']
                   [$key]])->count();
             if($attrCountSizes>0){
                return redirect('/add-attributes/'.$id)->with('flash_message_error',''.$data['size'][$key].'Size is already exist please select another size');
             }
             $attribute = new ProductsAttributes;
             $attribute->product_id = $id;
             $attribute->sku = $val;
             $attribute->size = $data['size'][$key];
             $attribute->price = $data['price'][$key];
             $attribute->stock = $data['stock'][$key];
             $attribute->save();
        }
        
     }
     return redirect('/add-attributes/'.$id)->with('flash_message_success','Products attributes added successfully!');
}
        return view('backend.products.add_attributes',compact('productDetails'));
    }

    public function deleteAttribute($id=null)
    {
        ProductsAttributes::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_error','Product Attribute is deleted');
    }

    //Edit Attributes
    public function editAttributes(Request $request,$id=null)
    {
        // echo "string"; die;
        if($request->isMethod('post'))
        {
            $data = $request->all();
            foreach($data['attr'] as $key=>$attr)
            {
                //echo "<pre>"; print_r($data); die;
                ProductsAttributes::where(['id'=>$data['attr'][$key]])->update(['sku'=>$data['sku'][$key],'size'=>$data['size'][$key],'price'=>$data['price'][$key],'stock'=>$data['stock'][$key]]);
            }
            return redirect()->back()->with('flash_message_success','Products Attributes Updated!!!');
        }
    }

    //Add Images
    public function addImages(Request $request,$id=null)
    {
        $productDetails = Product2::where(['id'=>$id])->first();
        if($request->isMethod('post'))
        {
            $data = $request->all();
            if($request->hasfile('image')){
                $files = $request->file('image');
                foreach ($files as $file) {
                    $image = new ProductsImages;
                    $extension = $file->getClientOriginalExtension();
                     $filename = rand(111,99999).'.'.$extension;
                    $img_path = 'upload/products/'.$filename;
                    Image::make($file)->save($img_path);
                    $image->image = $filename;
                    $image->product_id = $data['product_id'];
                    $image->save();
                }
            }
            return redirect('/add-images/'.$id)->with('flash_message_success','Image has been Updated');
        }
        $productImages= ProductsImages::where(['product_id'=>$id])->get();
        return view('backend.products.add_images')->with(compact('productDetails','productImages'));
    }

    public function deleteAltImage($id=null){
        $productImage = ProductsImages::where(['id'=>$id])->first();

        $img_path = 'upload/';
        if (file_exists($img_path.$productImage->image)) {
            unlink($img_path.$productImage->image);
        }
        ProductsImages::where(['id'=>$id])->delete();

            return redirect()->back()->with('flash_message_success','iMAGE DELETED');

    }

    public function updateFeatured(Request $request,$id=null)
    {
        $data = $request->all();
        Product2::where('id',$data['id'])->update(['featured_products'=>$data['status']]);
    }

    public function getprice(Request $request){
        $data = $request->all();
        $proArr = explode("-", $data['idSize']);
        $proAttr = ProductsAttributes::where(['product_id'=>$proArr[0],'size'=>$proArr[1]])->first();
        echo $proAttr->price; 
    }

    public function addtoCart(Request $request)
    {
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        $data = $request->all();
        if(empty(Auth::user()->email)){
            $data['user_email'] = '';
        }else{
           $data['user_email'] = Auth::user()->email; 
        }
        $session_id = Session::get('session_id');
        if(empty($session_id)){
        //$session_id = str_random(40);
        $session_id = Str::random(40);
        Session::put('session_id',$session_id);
        }

        $sizeArr =explode('-', $data['size']);
        $countProducts = DB::table('cart')->where(['product_id'=>$data['product_id'],
            'product_name'=>$data['product_name'],
            'product_code'=>$data['product_code'],
            'size'=>$sizeArr[1],
            'session_id'=>$session_id
            ])->count();
        if($countProducts>0){
            return redirect()->back()->with('flash_message_error','Product already exists in Cart');
        }else{
            DB::table('cart')->insert(['product_id'=>$data['product_id'],
            'product_name'=>$data['product_name'],
            'product_code'=>$data['product_code'],
            'product_color'=>$data['product_color'],
            'price'=>$data['price'],
            'size'=>$sizeArr[1],
            'quantity'=>$data['quantity'],
            'user_email'=>$data['user_email'],
            'session_id'=>$session_id
            ]);
        }
        
        return redirect('/cart')->with('flash_message_success','Product has been added in Cart');
    }

    public function cart(Request $request)
    {
        if(Auth::check()){
            $user_email = Auth::user()->email;
            $userCart   = DB::table('cart')->where(['user_email'=>$user_email])->get();
        }
        else{
            $session_id = Session::get('session_id');
            $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
        }
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();         // for sidebar
        
        foreach($userCart as $key=>$products)
        {
            // echo $products->product->id;
            $productDetails = Product2::where(['id'=>$products->product_id])->first();
            //echo $userCart[$key]->image = "Test";
            //echo $userCart[$key]->image = $productDetails->image;

            $userCart[$key]->image = $productDetails->image;

        }
        
        //echo "<pre>"; print_r($userCart); die;
        return view('frontend.products.cart')->with(compact('categories','userCart'));
    }

    public function deleteCartProduct($id=null){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        DB::table('cart')->where('id',$id)->delete();
        return redirect('/cart')->with('flash_message_error','Product has been deleted');
    }

    public function updateCartQuantity($id=null,$quantity=null){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        DB::table('cart')->where('id',$id)->increment('quantity',$quantity);
        return redirect('/cart')->with('flash_message_success','Product Quantity has been Updated successfully');
    }

    public function applyCoupon(Request $request){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;
            $couponCount = Coupons::where('coupon_code',$data['coupon_code'])->count();
            if($couponCount == 0){
                return redirect()->back()->with('flash_message_error','Coupon code does not exists');
            }else{
                // echo "Success";die;
                $couponDetails = Coupons::where('coupon_code',$data['coupon_code'])->first();
                //Coupon code Status
                if($couponDetails->status==0){
                    return redirect()->back()->with('flash_message_error','Coupon does not Active');
                }
                //Check coupon expiry date
                $expiry_date = $couponDetails->expiry_date;
                $current_date = date('Y-m-d');
                if($expiry_date < $current_date){
                    return redirect()->back()->with('flash_message_error','Coupon code is Expired');
                }

                //Coupon is ready for discount
                $session_id = Session::get('session_id');
                // $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
                if(Auth::check()){
                    $user_email = Auth::user()->email;
                    $userCart   = DB::table('cart')->where(['user_email'=>$user_email])->get();
                }
                else{
                    $session_id = Session::get('session_id');
                    $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
                }
                $total_amount = 0;
                foreach($userCart as $item){
                    $total_amount = $total_amount + ($item->price*$item->quantity);
                }
                //Check if Coupon amount is fixed or percentage
                if($couponDetails->amount_type=="Fixed"){
                    $couponAmount = $couponDetails->amount;
                }else{
                    $couponAmount = $total_amount * ($couponDetails->amount/100);
                }
                //Add Coupon code in Session
                Session::put('CouponAmount',$couponAmount);
                Session::put('CouponCode',$data['coupon_code']);
                return redirect()->back()->with('flash_message_success','Coupon code is successfully Applied. You are vailing discount');
            }
        }
    }

    public function checkout(Request $request){

        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $shippingDetails =DeliveryAddress::where('user_id',$user_id)->first();
        $userDetails = User::find($user_id);

        $countries = Country::get();

        //check if shipping address exists
        $shippingCount = DeliveryAddress::where('user_id',$user_id)->count();
        $shippingDetails = array();
        if($shippingCount > 0){
            $shippingDetails = DeliveryAddress::where('user_id',$user_id)->first();
        }
        //Update Cart table with Email
        // $session_id = Session::get('session_id');
        // DB::table('cart')->where(['session_id'=>$session_id])->update(['user_email'=>$user_email]);


        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>";print_r($data);die;
            //Update User Details
            User::where('id',$user_id)->update(['name'=>$data['billing_name'],
                    'address'=>$data['billing_address'],
                    'city'=>$data['billing_city'],
                    'state'=>$data['billing_state'],
                    'country'=>$data['billing_country'],
                    'pincode'=>$data['billing_pincode'],
                    'mobile_no'=>$data['billing_mobile_no']
        ]);
            if($shippingCount > 0){
                DeliveryAddress::where('user_id',$user_id)->update(['name'=>$data['shipping_name'],
                    'address'=>$data['shipping_address'],
                    'city'=>$data['shipping_city'],
                    'state'=>$data['shipping_state'],
                    'country'=>$data['shipping_country'],
                    'pincode'=>$data['shipping_pincode'],
                    'mobile_no'=>$data['shipping_mobile_no']
        ]); 
        }else{
            // New Shipping Address
            $shipping = new DeliveryAddress;
            $shipping->user_id = $user_id;
            $shipping->user_email = $user_email;
            $shipping->name = $data['shipping_name'];
            $shipping->address = $data['shipping_address'];
            $shipping->city= $data['shipping_city'];
            $shipping->state = $data['shipping_state'];
            $shipping->country = $data['shipping_country'];
            $shipping->pincode = $data['shipping_pincode'];
            $shipping->mobile_no = $data['shipping_mobile_no'];
            $shipping->save();
        }
        return redirect('/order-review');
        }
        return view('frontend.products.checkout',compact('categories','userDetails','countries','shippingDetails'));
    }

    public function orderReview()
    {
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $shippingDetails =DeliveryAddress::where('user_id',$user_id)->first();
        $userDetails = User::find($user_id);
        $userCart= DB::table('cart')->where(['user_email'=>$user_email])->get();
        foreach ($userCart as $key => $product) {
            $productDetails= Product2::where('id',$product->product_id)->first();
            $userCart[$key]->image= $productDetails->image;
        }
        return view('frontend.products.order_review',compact('categories','shippingDetails','userDetails','userCart'));
    }

    public function placeOrder(Request $request)
    {
        if($request->isMethod('post'))
        {
            $user_id = Auth::user()->id;
            $user_email =Auth::user()->email;
            $data = $request->all();

            //Get Shipping Details of Users
            $shippingDetails = DeliveryAddress::where(['user_email'=>$user_email])->first();
            // if(empty($data['coupon_code']))
            // {
            //     $data['coupon_code'] = '';
            // }

            // if(empty($data['coupon_amount']))
            // {
            //     $data['coupon_amount'] = '0';
            // }

            if(empty(Session::get('CouponCode'))){
                $coupon_code = 'Not Used';
            }else{
                $coupon_code = Session::get('CouponCode');
            }

            if(empty(Session::get('CouponAmount'))){
                $coupon_amount = '0';
            }else{
                $coupon_amount = Session::get('CouponAmount');
            }
            
            // echo "<pre>"; print_r($data);
            $order = new Orders;
            $order->user_id = $user_id;
            $order->user_email = $user_email;
            $order->name = $shippingDetails->name;
            $order->address = $shippingDetails->address;
            $order->city = $shippingDetails->city;
            $order->state = $shippingDetails->state;
            $order->pincode = $shippingDetails->pincode;
            $order->country = $shippingDetails->country;
            $order->mobile_no = $shippingDetails->mobile_no;
            $order->coupon_code = $coupon_code;
            $order->coupon_amount = $coupon_amount;
            $order->order_status = "New";
            $order->payment_method = $data['payment_method'];
            $order->grand_total = $data['grand_total'];
            $order->save();

            $order_id = DB::getPdo()->lastinsertID();

            $catProducts = DB::table('cart')->where(['user_email'=>$user_email])->get();

            foreach($catProducts as $pro){
                $cartPro = new OrdersProduct;
                $cartPro->order_id      = $order_id;
                $cartPro->user_id       = $user_id;
                $cartPro->product_id    = $pro->product_id;
                $cartPro->product_code  = $pro->product_code;
                $cartPro->product_name  = $pro->product_name;
                $cartPro->product_size  = $pro->size;
                $cartPro->product_price = $pro->price;
                $cartPro->product_qty   = $pro->quantity;
                $cartPro->save();
            }

            Session::put('order_id',$order_id);
            Session::put('grand_total',$data['grand_total']);
            return redirect('/thanks');
        }
    }

    public function thanks()
    {
        $user_email = Auth::user()->email;
        DB::table('cart')->where('user_email',$user_email)->delete();
        return view('frontend.orders.thanks');
    }

    public function userOrders()
    {
        $user_id = Auth::user()->id;
        $orders = Orders::with('orders')->where('user_id',$user_id)->OrderBy('id','DESC')->get();
        // echo "<pre>";print_r($orders);die;
        return view('frontend.orders.user_orders',compact('orders'));
    }

    public function userOrderDetails($order_id)
    {
        $orderDetails = Orders::with('orders')->where('id',$order_id)->first();
        $user_id = $orderDetails->user_id;
        $userDetails = User::where('id',$user_id)->first();

        return view('frontend.orders.user_order_details',compact('orderDetails','userDetails'));

    }

    public function viewOrders()
    {
        $orders = Orders::with('orders')->orderBy('id','DESC')->get(); 
        return view('backend.orders.view_orders',compact('orders'));
    }

    // public function viewOrderDetail($order_id){
        
    //     $orderDetails = Orders::with('order')->where('id',$order_id)->first();
    //     $user_id = $orderDetails->user_id;
    //     $userDetails = User::where('id',$user_id)->first();
    //     return view('backend.orders.order_details')->with(compact('orderDetails','userDetails'));
    // }
}
