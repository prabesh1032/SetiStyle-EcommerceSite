<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $data['user_id'] = Auth::id();
        $data['status']='pending';

        try {
            DB::beginTransaction();

            // Get the product and check stock availability with lock
            $product = Product::where('id', $data['product_id'])->lockForUpdate()->first();

            if (!$product) {
                return back()->with('error', 'Product not found.');
            }

            if ($product->stock < $data['quantity']) {
                return back()->with('error', 'Insufficient stock. Only ' . $product->stock . ' items available.');
            }

            // Create order
            Order::create($data);

            // Decrease product stock
            $product->stock -= $data['quantity'];
            $product->save();

            // Delete cart item
            Cart::find($request->cart_id)->delete();

            DB::commit();

            return redirect('/')->with('success','Order has been placed successfully');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Order could not be processed. Please try again.');
        }
    }
    public function index()
    {
        $orders = Order::latest()->paginate(10);
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
    public function prepareEsewa(Request $request)
    {
        // Validate and store checkout information in session
        $request->validate([
            'phone' => 'required',
            'address' => 'required',
        ]);

        // Store in session for later use
        session(['checkout_phone' => $request->phone]);
        session(['checkout_address' => $request->address]);

        return response()->json(['success' => true]);
    }

    public function storeEsewa(Request $request, $cartid)
{
    // Decode and parse the response from eSewa
    $data = $request->data;
    $data = base64_decode($data);
    $data = json_decode($data);

    $status = $data->status;

    if ($status === "COMPLETE") {
        try {
            DB::beginTransaction();

            // Find the cart
            $cart = Cart::find($cartid);

            // Check if cart exists
            if (!$cart) {
                return back()->with('error', 'Cart item not found.');
            }

            // Check if product exists and has sufficient stock with lock
            $product = Product::where('id', $cart->product_id)->lockForUpdate()->first();
            if (!$product) {
                return back()->with('error', 'Product not found.');
            }

            if ($product->stock < $cart->quantity) {
                return back()->with('error', 'Insufficient stock. Only ' . $product->stock . ' items available.');
            }

            // Get user phone and address from session if stored, otherwise use defaults
            $userPhone = session('checkout_phone', 'Not provided');
            $userAddress = session('checkout_address', 'Not provided');

            // Clear session data
            session()->forget(['checkout_phone', 'checkout_address']);

            // Create the order
            $order = new Order();
            $order->product_id = $cart->product_id;
            $order->price = $cart->product->price;
            $order->quantity = $cart->quantity;
            $order->payment_method = "eSewa";
            $order->name = $cart->user->name;
            $order->phone = $userPhone;
            $order->address = $userAddress;
            $order->user_id = Auth::id();
            $order->status = "Pending";
            $order->save();

            // Decrease product stock
            $product->stock -= $cart->quantity;
            $product->save();

            // Delete the cart item
            $cart->delete();

            DB::commit();

            return redirect('/')->with('success', 'Order has been placed successfully');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Order could not be processed. Please try again.');
        }
    }

    // Handle failure case
    return back()->with('error', 'Payment was not successful.');
}
}
