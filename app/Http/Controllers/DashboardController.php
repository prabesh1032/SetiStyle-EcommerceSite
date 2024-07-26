<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalproducts=Product::count();
        $totalorders=Order::count();
        $deliverorders=Order::where('status','Deliver')->count();
        $processingorders=Order::where('status','Processing')->count();
        $pendingorders=Order::where('status','Pending')->count();
        $totalcategories=Category::count();
        $totalbrands=Brand::count();
        return view('dashboard',compact('totalproducts','totalcategories','totalbrands','totalorders',
    'pendingorders','deliverorders','processingorders'));
    }
}
