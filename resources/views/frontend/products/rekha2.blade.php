public function addtoCart(Request $request){
        Session::forget('CouponAmount');
        Session::forget('CouponCode');

        $data=$request->all();
       // echo "<pre>";print_r($data);die;  

        if(empty(Auth::user()->email)){
            $data['user_email']='';
        }else{
            $data['user_email']=Auth::user()->email;
        }
        
        
        $session_id=Session::get('session_id');
        if(empty($session_id)){

           $session_id=str_random(40);
           Session::put('session_id',$session_id); 
        }
        //composer require laravel/helpers
        // $session_id = str_random(40); 
        // Session::put('session_id',$session_id);


        // if(empty($data['session_id'])){
        //   $data['session_id']= '';
        // }
        // $countProducts =DB::table('carts')->where(['product_id'=>$data['product_id'],'product_code'=>$data['product_code'],'session_id'=>$session_id])->count();
        // if($countProducts>0){
        //     return redirect()->back()->with('message','Product already exit');
        // }


      DB::table('carts')->insert(['product_id'=>$data['product_id'],'product_name'=>$data['product_name'],'product_code'=>$data['product_code'],'price'=>$data['price'],'quantity'=>$data['quantity'],'useremail'=>$data['user_email'],'session_id'=>$session_id]); 

      return redirect('/cart')->with('message','Product Succesfully Added To In Cart!');

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