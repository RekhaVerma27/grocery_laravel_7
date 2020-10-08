<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;


class CategoryController extends Controller
{
    public function add_category(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    	$data = $request->all();
    	$category = new Category();

    	$category->name         = $data['name'];
    	$category->parent_id    = $data['parent_id'];
    	$category->url          = $data['url'];
    	$category->description  = $data['description'];
    	
    	$category->save();	
    	return redirect('/view-categories');
   		}
    	$levels = Category::where(['parent_id'=>0])->get();

    	return view('backend.category.add_category')->with(compact('levels'));
    }

    public function viewCategories()
    {
        $categories = Category::get();
        return view('backend.category.view_category')->with(compact('categories'));
    }

    public function editCategory(Request $request,$id=null)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            Category::where(['id'=>$id])->update([
                'name'=>$data['name'],
                'parent_id'=>$data['parent_id'],
                'url'=>$data['url'],
                'description'=>$data['description']
            ]);

            return redirect('/view-categories')->with('flash_message_success','Category updated');
        }
         $levels = Category::where(['parent_id'=>0])->get();

        $categoryDetails = Category::where(['id'=>$id])->first();
        
        return view('backend.category.edit_category')->with(compact('levels','categoryDetails'));
    }

    public function deleteCategory($id=null)
    {
        Category::where(['id'=>$id])->delete();
        return redirect('/view-categories')->with('flash_message_error','Category deleted');
    }

    public function updateStatus(Request $request,$id=null)
    {
        $data = $request->all();
        Category::where('id',$data['id'])->update(['status'=>$data['status']]);
    }

}
