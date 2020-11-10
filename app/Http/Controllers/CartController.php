<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Coupon;
use Session;

class CartController extends Controller
{
    public function addToCart(Request $request,$product_id){
        
        $check = Cart::where('product_id',$product_id)->where('user_ip',request()->ip())->first();
        if($check){
             Cart::where('product_id',$product_id)->where('user_ip',request()->ip())->increment('qty');
             return redirect()->back()->with('cart','Product added on Cart');
        }else{
            Cart::insert([
                'product_id' => $product_id,
                'qty' => 1,
                'price' => $request->price,
                'user_ip' => request()->ip(),
            ]);
            return redirect()->back()->with('cart','Product added on Cart');
        }
        
    }

//    ======== cart page =========

 public function cartPage(){

     $carts = Cart::where('user_ip',request()->ip())->latest()->get();

     $subtotal = Cart::all()->where('user_ip',request()->ip())->sum(function($t){
        return $t->price* $t->qty;
     });
     return view('pages.cart',compact('carts','subtotal'));
 }

 //   ======== cart destroy ======

 public function destroy($cart_id){
   Cart::where('id',$cart_id)->where('user_ip',request()->ip())->delete();
   return redirect()->back()->with('cart_delete',' Cart Product Remove');
 }
 
 //   ========== cart quantity update ==========

 public function quantityUpdate(Request $request,$cart_id){

    Cart::where('id',$cart_id)->where('user_ip',request()->ip())->update([
        'qty' => $request->qty,
    ]);
    return redirect()->back()->with('cart_update',' Quantity Updated');

 }

//   ========== Apply Coupon Apply ==========

public function applyCoupon(Request $request){
    $check = Coupon::where('coupon_name',$request->coupon_name)->first();

    if($check){
        $subtotal = Cart::all()->where('user_ip',request()->ip())->sum(function($t){
            return $t->price* $t->qty;
         });

        Session::put('coupon',[
            'coupon_name' => $check->coupon_name,
            'coupon_discount' => $check->discount,
            'discount_amount' => $subtotal * $check->discount/100,


        ]);

        return redirect()->back()->with('cart_update','Successfully Coupon Applied');

    }else{
        return redirect()->back()->with('cart_delete','Invalid Coupon');
    }
}


//========coupon destroy ===========

public function couponDestroy(){
    if (Session::has('coupon')) {

        session()->forget('coupon');
        return redirect()->back()->with('cart_delete','Coupon Removed ');
       
    }
}


}
