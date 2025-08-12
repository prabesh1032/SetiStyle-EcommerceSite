<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $data= $request->validate([
        'product_id'=>'required',
        'quantity'=>'required|integer'
    ]);
        $data['user_id']=auth()->user()->id;

        // Check if product exists and has sufficient stock
        $product = Product::find($data['product_id']);
        if (!$product) {
            return back()->with('error', 'Product not found.');
        }

        if ($product->stock < $data['quantity']) {
            return back()->with('error', 'Insufficient stock. Only ' . $product->stock . ' items available.');
        }

        $check=Cart::where('user_id',$data['user_id'])->where('product_id',$data['product_id'])->count();
            if($check>0){
                return back()->with('error','Product Already in Cart');

            }
        Cart::create($data);
        return back()->with('success','product Added to cart Successfully');

    }
    public function mycart()
    {
        $carts=Cart::where('user_id',auth()->user()->id)->get();
        return view('cart',compact('carts'));
    }
    public function destroy(Request $request)
    {
        Cart::find($request->dataid)->delete();
        return back()->with('success','Product Removed from Cart Sucessfully');
    }
    public function checkout($id)
    {
        $cart=Cart::find($id);
        if($cart->user_id != auth()->user()->id){
            return back()->with('error','Unauthorized Access');
        }

        // Check if the product still has sufficient stock
        $product = $cart->product;
        if (!$product) {
            return back()->with('error', 'Product no longer exists.');
        }

        if ($product->stock < $cart->quantity) {
            return back()->with('error', 'Insufficient stock. Only ' . $product->stock . ' items available. Please update your cart.');
        }

        return view('checkout',compact('cart'));
    }
}
