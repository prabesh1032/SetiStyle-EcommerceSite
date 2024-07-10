<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::all();
        return view('products.index',compact('products'));
    }
    public function create()
    {
        $categories=Category::orderBy('priority')->get();
        $brands=Brand::all();
        return view('products.create',compact('categories','brands'));

    }
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|alpha',
            'category_id'=>'required',
            'brand_id'=>'required',
            'price'=>'required|integer',
            'stock'=>'required',
            'description'=>'required',
            'photopath'=>'required|image',
        ]);
        $photoname=time().'.'.$request->photopath->extension();
        $request->photopath->move(public_path('images'),$photoname);
        $data['photopath']=$photoname;

        Product::create($data);
       return redirect()->route('products.index')->with('success','Product Created Sucessfully');

    }
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all(); // Assuming you have a Category model
        $brands = Brand::all(); // Assuming you have a Brand model

        return view('products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request,$id)
    {
        $data=$request->validate([
            'name'=>'required|alpha',
            'category_id'=>'required',
            'brand_id'=>'required',
            'price'=>'required|integer',
            'stock'=>'required',
            'description'=>'required',
            'photopath'=>'required|image',
        ]);
        $product= Product::find($id);
        if($request->hasFile('photopath'))
        {
            $photoname=time().'.'.$request->photopath->extension();
            $request->photopath->move(public_path('images'),$photoname);
            $data['photopath']=$photoname;
            //delete old photo
            $oldphoto=public_path('images').'/'.$product->photopath;
        if(file_exists($oldphoto))
        {
            unlink($oldphoto);
        }
     }
        Product::find($id)->update($data);
        return redirect()->route('products.index')->with('success','Product Updated aSucessfully');

    }
    public function destroy($id)
    {
        $product=Product::find($id);
        $photo=public_path('images').'/'.$product->photopath;
        if(file_exists($photo))
        {
            unlink($photo);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success','Product Deleted Sucessfully');
    }
}

