<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $categories = Category::latest()->get();
        return view('admin.category.index',compact('categories'));
    }

 //   =========store category========

    public function storeCat(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories,category_name'
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success','Category Added');
    }

  //    =========Edit category========

  public function edit($cat_id){
     $category = Category::find($cat_id);
     return view('admin.category.edit',compact('category'));
  }

 //   ========update category =========

  public function updateCat(Request $request){
    
    $cat_id = $request->id;
    Category::find($cat_id)->update([
        'category_name' => $request->category_name,
        'updated_at' => Carbon::now(),
    ]);

    return redirect()->route('admin.category')->with('catupdated','Category Updated Successfully');
    
    }

   // =====Delete Category=========

   public function delete($cat_id){
       Category::find($cat_id)->delete();

       return redirect()->back()->with('delete','Category Deleted Successfully');
   }


 //  =======status inactive========

 public function inactive($cat_id){
     Category::find($cat_id)->update(['status' => 0]);

     return redirect()->back()->with('catupdated','Category Inactive');

 }

 //  =======status active========

 public function active($cat_id){
    Category::find($cat_id)->update(['status' => 1]);

    return redirect()->back()->with('catupdated','Category active');

}

}
