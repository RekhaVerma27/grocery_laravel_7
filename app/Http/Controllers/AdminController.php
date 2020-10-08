<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Users;
use Session;
class AdminController extends Controller
{
    public function login(Request $request)
    {
        // echo "rekha";
        // echo $data = $request->Input();die;
    	if($request->isMethod('post'))
    	{
    	    $data = $request->Input();
    		if(Auth::attempt([
    			'email'    =>$data['username'],
    			'password' =>$data['password'],
                'admin'    =>'1'
    			]))
    		{
    			return redirect('/admin/dashboard');
    		}
    		else
    		{
    			return redirect('/admin')->with('flash_message_error','Invalid Username Or Paasword');
    		}
    	}
    	return view('backend.admin_login');
    }

    public function dashboard()
    {
    	return view('backend.index');
    }

    public function logout()
    {
    	Session::flush();
    	return redirect('/admin')->with('flash_message_success','loged out Successfully');
    }
}
