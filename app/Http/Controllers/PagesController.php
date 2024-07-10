<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $products=Product::latest()->get();
        return view("welcome",compact('products'));
    }
    public function about()
    {
        return view("about");
    }
    public function contact()
    {
        return view("contact");
    }

}
