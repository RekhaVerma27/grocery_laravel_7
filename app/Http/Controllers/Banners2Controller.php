<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banners2;
use Illuminate\Support\Facades\Input;
use Image;

class Banners2Controller extends Controller
{
    public function banners()
    {
    	$banners = Banners2::get();
    	return view('backend.banner.banners')->with(compact('banners'));
    }

    public function addbanner(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		$data = $request->all();
    		$banner = new Banners2;
    		$banner->name       = $data['name'];
    		$banner->text_style = $data['text_style'];
    		$banner->sort_order = $data['sort_order'];
    		$banner->content    = $data['content'];
    		$banner->link       = $data['link'];

    		//update image
    		if($request->hasfile('image')){

            echo $img_tmp = input::file('image');
            if($img_tmp->isValid()){

                $extension = $img_tmp->getClientOriginalExtension();
                $filename = rand(111,99999).'.'.$extension;
                $img_path = 'upload/banners/'.$filename;

                image::make($img_tmp)->resize(500,500)->save($img_path);
                $banner->image = $filename;
            }
    	}
    	$banner->save();
    	return redirect('/banners')->with('flash_message_success','Banners Added Successfully');
    }
    	return view('backend.banner.add_banner');
    }

    public function updateStatus(Request $request,$id=null)
    {
        $data = $request->all();
        Banners2::where('id',$data['id'])->update(['status'=>$data['status']]);
    }

    public function editBanner(Request $request,$id=null)
    {
    	 if($request->isMethod('post')){
            $data = $request->all();

         //upload image

        if($request->hasfile('image')){

            echo $img_tmp = input::file('image');
            if($img_tmp->isValid()){

                $extension = $img_tmp->getClientOriginalExtension();
                $filename = rand(111,99999).'.'.$extension;
                $img_path = 'upload/banners/'.$filename;

                image::make($img_tmp)->save($img_path);   
            }
        }else if(!empty($data['current_image']))
            {
                    $filename = $data['current_image'];
            }
            else
            {
                    $filename = '';
            }
        Banners2::where(['id'=>$id])->update([
        		'name'=>$data['name'],
        		'text_style'=>$data['text_style'],
    			'sort_order'=>$data['sort_order'],
    			'content'=>$data['content'],
    			'link'=>$data['link'],
    			'image'=>$filename
        ]);
        return redirect('/banners')->with('flash_message_success','Banner Edit Successfully');
    }
    	$banner = Banners2::where(['id'=>$id])->first();
    	return view('backend.banner.edit_banner')->with(compact('banner'));
    }

    public function deleteBanner($id)
    {
    	$banner = Banners2::find($id);
        $deleted = $banner->delete();

        if($deleted)
            {
                return redirect('/banners')->with('flash_message_error','Banner Deleted Successfully');
            }
    }

}
