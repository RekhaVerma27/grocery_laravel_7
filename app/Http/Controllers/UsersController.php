<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use Session;
use Auth;
use App\Country;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    Public function userLoginRegister(){
    	$categories = Category::with('categories')->where(['parent_id'=>0])->get();
    	return view('frontend.users.login_register')->with(compact('categories'));
    }

    Public function register(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		// echo "<pre>";print_r($data);die;
    		$userCount = User::where('email',$data['email'])->count();
    		if($userCount>0){
    			return redirect()->back()->with('flash_message_error','Email is already exists');
    		}else{
    			//adding user in table
    			$user = new User;
    			$user->name = $data['name'];
    			$user->email = $data['email'];
    			$user->password = bcrypt($data['password']);
    			$user->save();
    			if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                    Session::put('frontSession',$data['email']);
    				return redirect('/cart');
    			}
    		}
    	}

    }

    Public function logout(){
        Session::forget('frontSession');
    	Auth::logout();
    	return redirect('/');
    }

    Public function login(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		// echo "<pre>";print_r($data);die;
    		if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                Session::put('frontSession',$data['email']);
    			return redirect('/cart');
    		}else{
    			return redirect()->back()->with('flash_message_error','Invalid User and Password!');
    		}
    	}
    }

    Public function account(Request $request){
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        return view('frontend.users.account',compact('categories'));
    }

    Public function changePassword(Request $request){
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        if($request->isMethod('post')){
            $data = $request->all();
            $old_password = User::where('id',Auth::User()->id)->first();
            $current_password = $data['current_password'];
            if(Hash::check($current_password,$old_password->password)){
                $new_password = bcrypt($data['new_password']);
                User::where('id',Auth::User()->id)->update(['password'=>$new_password]);
                return redirect()->back()->with('flash_message_success','Your Password is Changed Now!');
            }else{
                return redirect()->back()->with('flash_message_error','Your Old Password is Incorrect!');
            }
        }
        return view('frontend.users.change_password',compact('categories'));
    }

    Public function changeAddress(Request $request){
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        $user_id = Auth::user()->id;
        $userDetails = User::find($user_id);
        // echo "<pre>";print_r($userDetails);die;
        if($request->isMethod('post')){
            $data = $request->all();
            $user = User::find($user_id);
            $user->name = $data['name'];
            $user->address = $data['address'];
            $user->city = $data['city'];
            $user->state = $data['state'];
            $user->country = $data['country'];
            $user->pincode = $data['pincode'];
            $user->mobile_no = $data['mobile_no'];
            $user->save();
            return redirect()->back()->with('flash_message_success','Account Details has been Updated!');
        }
        $countries = Country::get();

        return view('frontend.users.change_address',compact('categories','countries','userDetails'));   
    }
}
