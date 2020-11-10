<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coupon;
use Carbon\Carbon;
class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

   //   =========index coupon========

    public function index(){
        $coupons = Coupon::latest()->get();
        return view('admin.coupon.index', compact('coupons'));
    }


     //   =========store coupon========

     public function store(Request $request){
    

        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'discount' => $request->discount,

            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success','Coupon Added');
    }

          //    =========Edit brand========

  public function edit($coupon_id){

    $coupon = Coupon::find($coupon_id);
    return view('admin.coupon.edit',compact('coupon'));
 }


  //   ========update Coupon =========

  public function update(Request $request){
    
    $coupon_id = $request->id;
    Coupon::find($coupon_id)->update([
        'coupon_name' => $request->coupon_name,
        'updated_at' => Carbon::now(),
    ]);

    return redirect()->route('admin.coupon')->with('catupdated','Coupon Updated Successfully');
    
    }

       // =====Delete Category=========

   public function delete($coupon_id){
    Coupon::find($coupon_id)->delete();

    return redirect()->back()->with('delete','Coupon Deleted Successfully');
}

 //  =======status inactive========

 public function inactive($coupon_id){
    Coupon::find($coupon_id)->update(['status' => 0]);

    return redirect()->back()->with('catupdated','Coupon Inactive');

}

//  =======status active========

public function active($coupon_id){
    Coupon::find($coupon_id)->update(['status' => 1]);

   return redirect()->back()->with('catupdated','Coupon active');

}




}
