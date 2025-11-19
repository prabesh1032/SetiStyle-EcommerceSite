<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $sort_price = request('sort_price', '');
        $category_id = request('category_id', '');
        $brand_id = request('brand_id', '');

        // Base query
        $query = Product::query();

        // Filter by category
        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        // Filter by brand
        if ($brand_id) {
            $query->where('brand_id', $brand_id);
        }

        // Get products
        $products = $query->latest()->get();

        // Apply bubble sort for price
        if ($sort_price) {
            $productsArray = $products->toArray();
            $n = count($productsArray);

            // Bubble sort algorithm
            for ($i = 0; $i < $n; $i++) {
                for ($j = 0; $j < $n - $i - 1; $j++) {
                    if ($sort_price === 'high_to_low') {
                        if ($productsArray[$j]['price'] < $productsArray[$j + 1]['price']) {
                            $temp = $productsArray[$j];
                            $productsArray[$j] = $productsArray[$j + 1];
                            $productsArray[$j + 1] = $temp;
                        }
                    } else {
                        if ($productsArray[$j]['price'] > $productsArray[$j + 1]['price']) {
                            $temp = $productsArray[$j];
                            $productsArray[$j] = $productsArray[$j + 1];
                            $productsArray[$j + 1] = $temp;
                        }
                    }
                }
            }
            // Convert back to collection of Product models
            $products = collect($productsArray)->map(function($product) {
                return is_array($product) ? (object) $product : $product;
            });
        }

        return view("welcome", compact('products'));
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

        // Apply price sorting if requested
        if(request('sort_price')) {
            $productsArray = $products->toArray();
            $n = count($productsArray);

            // Bubble sort implementation
            for($i = 0; $i < $n - 1; $i++) {
                for($j = 0; $j < $n - $i - 1; $j++) {
                    if(request('sort_price') == 'high_to_low') {
                        if($productsArray[$j]['price'] < $productsArray[$j + 1]['price']) {
                            $temp = $productsArray[$j];
                            $productsArray[$j] = $productsArray[$j + 1];
                            $productsArray[$j + 1] = $temp;
                        }
                    } else if(request('sort_price') == 'low_to_high') {
                        if($productsArray[$j]['price'] > $productsArray[$j + 1]['price']) {
                            $temp = $productsArray[$j];
                            $productsArray[$j] = $productsArray[$j + 1];
                            $productsArray[$j + 1] = $temp;
                        }
                    }
                }
            }

            // Convert back to objects
            $products = collect($productsArray)->map(function($item) {
                return (object) $item;
            });
        }

        return view('categoryproduct',compact('products','category'));
    }
    public function viewproduct($id)
    {
        $product = Product::find($id);
        $relatedproducts=Product::where('category_id',$product->category_id)->where('id','!=',$id)
        ->limit(4)->get();
        return view('viewproduct',compact('product','relatedproducts'));
    }

    public function search(Request $request)
    {
        $qry = $request->input('qry', '');
        $products = Product::where('name','like','%'.$qry.'%')->get();
        return view('search', compact('products', 'qry'));
    }

}
