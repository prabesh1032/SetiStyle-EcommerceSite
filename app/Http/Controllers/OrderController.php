<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        Cart::find($request->cart_id)->delete();
        return redirect('/')->with('success','Order has been placed sucessfully');
    }
    public function index()
    {
        $orders=Order::all();
        return view('orders.index',compact('orders'));

    }
    public function status($id,$status)
    {
        $order=Order::find($id);
        $order->status=$status;
        $order->save();
        $emaildata=[
            'name'=>$order->user->name,
            'status'=>$status,
        ];
        Mail::send('emails.orderemail',$emaildata,function($message)
        use($order){
            $message->to($order->user->email,$order->user->name)->subject
        ('Order Notification') ;
        });
        return back()->with('success', 'Order is now '.$status);
    }
}
