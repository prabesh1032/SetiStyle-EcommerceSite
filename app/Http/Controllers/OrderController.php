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
        $orders = Order::paginate(10);
        return view('orders.index', compact('orders'));

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
    public function storeEsewa(Request $request, $cartid)
    {
        // Decode and parse the response from eSewa
        $data = $request->data;
        $data = base64_decode($data);
        $data = json_decode($data);

        $status = $data->status;

        if ($status === "COMPLETE") {
            // Find the cart and create the order
            $cart = Cart::find($cartid);
            $order = new Order();
            $order->product_id = $cart->product_id;
            $order->price = $cart->product->price;
            $order->quantity = $cart->quantity;
            $order->payment_method = "eSewa";
            $order->name = $cart->user->name;
            $order->phone = 'N/A';  // You can get the phone number if needed
            $order->address = 'N/A';  // You can get the address if needed
            $order->user_id = auth()->user()->id;
            $order->status = "Pending";
            $order->save();

            // Delete the cart item
            $cart->delete();

            // Prepare email data (make sure to define this)
            $emaildata = [
                'name' => $order->user->name,
                'product_name' => $order->product->name,
                'quantity' => $order->quantity,
                'price' => $order->price,
                'total' => $order->price * $order->quantity,
            ];

            // Send the order notification email
            Mail::send('emails.orderemail', $emaildata, function($message) use($order) {
                $message->to($order->user->email, $order->user->name)
                        ->subject('Order Notification');
            });

            // Redirect or return a response
            return redirect('/')->with('success', 'Order has been placed successfully');
        }

        // In case the status is not COMPLETE, you can handle failure here
        return back()->with('error', 'Payment was not successful.');
    }

}
