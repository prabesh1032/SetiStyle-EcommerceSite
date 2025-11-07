<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(10);
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        
        Brand::create($data);
        return redirect()->route('brand.index')->with('success', 'Brand Created Successfully! ✓');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255'
        ]);
        
        $brand = Brand::findOrFail($id);
        $brand->update($data);
        return redirect()->route('brand.index')->with('success', 'Brand Updated Successfully! ✓');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('brand.index')->with('success', 'Brand Deleted Successfully! ✓');
    }
}
