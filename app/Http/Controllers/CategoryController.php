<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('priority')->paginate(10);
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required|integer|min:1',
        ]);
        
        Category::create($data);
        return redirect()->route('categories.index')->with('success', 'Category Created Successfully! ✓');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required|integer|min:1'
        ]);
        
        $category = Category::findOrFail($id);
        $category->update($data);
        return redirect()->route('categories.index')->with('success', 'Category Updated Successfully! ✓');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category Deleted Successfully! ✓');
    }
}
