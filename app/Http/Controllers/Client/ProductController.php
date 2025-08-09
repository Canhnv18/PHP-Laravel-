<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function list()
    {
        $query = request('q');
        $brandId = request('brand_id');
        $priceMin = request('price_min');
        $priceMax = request('price_max');

        $productsQuery = Product::with('brand');
        if ($query) {
            $productsQuery->where('name', 'like', '%' . $query . '%');
        }
        if ($brandId) {
            $productsQuery->where('brand_id', $brandId);
        }
        if ($priceMin !== null && $priceMin !== '') {
            $productsQuery->where('price', '>=', $priceMin);
        }
        if ($priceMax !== null && $priceMax !== '') {
            $productsQuery->where('price', '<=', $priceMax);
        }

        $products = $productsQuery->paginate(8)->withQueryString();
        // Lấy danh sách hãng để render filter
        $brands = Brand::all();
        return view('clients.products.list', compact('products', 'query', 'brands', 'brandId', 'priceMin', 'priceMax'));
    }
    public function details(Product $product)
    {
        // Lấy 5 sản phẩm liên quan cùng brand, loại trừ sản phẩm hiện tại
        $relatedProducts = Product::where('brand_id', $product->brand_id)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->limit(5)
            ->get();
        return view('clients.products.product_details', compact('product', 'relatedProducts'));
    }
}
