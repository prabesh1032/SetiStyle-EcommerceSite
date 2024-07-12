<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
    public function categoryproduct($id)
    {
        $category=Category::find($id);
        $products=Product::where('category_id',$id)->get();
        return view('categoryproduct',compact('products','category'));
    }

}
