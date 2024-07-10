<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalproducts=Product::count();
        $totalcategories=Category::count();
        $totalbrands=Brand::count();
        return view('dashboard',compact('totalproducts','totalcategories','totalbrands'));
    }
}
