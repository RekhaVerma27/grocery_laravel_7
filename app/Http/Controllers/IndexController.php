<?php

namespace App\Http\Controllers;
use App\Banners2;
use App\Category;
use App\Product2;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        $banners = Banners2::where('status','1')->orderby('sort_order','asc')->get(); 
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        $products = Product2::get();
        return view('frontend.index')->with(compact('banners','categories','products'));
    }

    public function event()
    {
    	return view('frontend.event');
    }

    public function about_us()
    {
    	return view('frontend.about_us');
    }

    public function best_deals()
    {
    	return view('frontend.best_deals');
    }

    public function services()
    {
    	return view('frontend.services');
    }

    public function contact_us()
    {
        return view('frontend.contact_us');
    }

    public function categories($category_id){
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        $products = Product2::where(['category_id'=>$category_id])->get();
        $product_name = Product2::where(['category_id'=>$category_id])->first();

        return view('frontend.category')->with(compact('categories','products','product_name'));
    }

    public function home()
    {
        $banners = Banners2::where('status','1')->orderby('sort_order','asc')->get();
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        $products = Product2::get();
        return view('frontend.index')->with(compact('banners','categories','products'));
    }

}
