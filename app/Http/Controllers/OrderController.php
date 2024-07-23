<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $data=$request->validate([
            'product_id'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'payment_method'=>'required',
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);
        $data['user_id']=auth()->user()->id;
        $data['status']='pending';
        Order::create($data);
        return back()->with('success','Order has been placed sucessfully');
    }
}
