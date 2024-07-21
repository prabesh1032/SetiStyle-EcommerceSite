<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
    $check=Cart::where('user_id',$data['user_id'])->where('product_id',$data['product_id'])->count();
        if($check>0){
            return back()->with('error','Product Already in Cart');

        }
    Cart::create($data);
    return back()->with('success','product Added to cart Successfully');

    }
}
