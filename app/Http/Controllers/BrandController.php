<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands=Brand::all();
        return view('brands.index',compact('brands'));
    }
    public function create()
    {
        return view('brands.create');
    }
    public function store(Request $request)
    {
        $data= $request->validate([
            'name'=>'required|alpha',

        ]);
        Brand::create($data);
       return redirect()->route('brand.index')->with('success','Brand Created Sucessfully');

    }
    public function edit($id)
    {
        $brand=Brand::find($id);
        return view('brands.edit',compact('brand'));

    }
    public function update(Request $request,$id)
    {
        $data=$request->validate([
            'name'=>'required | alpha'
        ]);
        $brand=Brand::find($id);
        $brand->update($data);
        return redirect()->route('brand.index')->with('success','Brand Updated Sucessfully');

    }
    public function destroy($id)
    {
        Brand::find  ($id)->delete();
        return redirect()->route('brand.index')->with('success','Brand Deleted Sucessfully');
    }
}
