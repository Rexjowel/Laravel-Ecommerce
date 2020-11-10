<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wishlist;
use Auth;
class WishlistController extends Controller
{
    public function addToWishlist($product_id)
    {
        if(Auth::check()){

            Wishlist::insert([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
        
               ]);
               return redirect()->back()->with('cart','Product added on Wishlist');
        }else{
            return redirect()->route('login')->with('loginError','At First Login Your Account');
        }
       
    }

   //       =========== pages===========

   public function wishPage(){
       $wishlists = Wishlist::where('user_id',Auth::id())->latest()->get();
       return view('pages.wishlist',compact('wishlists'));
   }


    //   ======== wishlist destroy ======

 public function destroy($wishlist_id){
    Wishlist::where('id',$wishlist_id)->where('user_id',Auth::id())->delete();

    return redirect()->back()->with('cart_delete',' Wishlist Product Remove');
  }
  
}
