<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use Carbon\Carbon;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

//   ==== index page =====

    public function index(){
        $brands = Brand::latest()->get();
        return view('admin.brand.index',compact('brands'));
    }

    //   =========store brand========

    public function store(Request $request){
        $request->validate([
            'brand_name' => 'required|unique:brands,brand_name'
        ]);

        Brand::insert([
            'brand_name' => $request->brand_name,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success','Brand Added');
    }

      //    =========Edit brand========

  public function edit($brand_id){

    $brand = Brand::find($brand_id);
    return view('admin.brand.edit',compact('brand'));
 }

 //   ========update brand =========

 public function update(Request $request){
    
    $brand_id = $request->id;
    Brand::find($brand_id)->update([
        'brand_name' => $request->brand_name,
        'updated_at' => Carbon::now(),
    ]);

    return redirect()->route('admin.brand')->with('catupdated','Brand Updated Successfully');
    
    }

    
   // =====Delete Category=========

   public function delete($brand_id){
    Brand::find($brand_id)->delete();

    return redirect()->back()->with('delete','Brand Deleted Successfully');
}

 //  =======status inactive========

 public function inactive($brand_id){
    Brand::find($brand_id)->update(['status' => 0]);

    return redirect()->back()->with('catupdated','Brand Inactive');

}

//  =======status active========

public function active($brand_id){
    Brand::find($brand_id)->update(['status' => 1]);

   return redirect()->back()->with('catupdated','Brand active');

}



}

