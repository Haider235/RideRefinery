<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // ✅ Filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // ✅ Filter by brand name (?brand=hello world)
        if ($request->filled('brand')) {
            $brand = Brand::where('name', $request->brand)->first();
            if ($brand) {
                $query->where('brand_id', $brand->id);
            }
        }
if ($request->filled('category')) {
    $query->whereHas('category', function ($q) use ($request) {
        $q->where('name', $request->category);
    });
}
        // ✅ Sorting
        if ($request->sort == 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort == 'price_desc') {
            $query->orderBy('price', 'desc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::all();

        return view('frontend.products', compact('products', 'categories'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('frontend.product-single', compact('product'));
    }
}
