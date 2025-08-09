<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $products = Product::all();
        // $brands = Brand::all();
        $products = Product::orderBy('id', 'desc')->paginate(10);
        // $products->load('brand');
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $brands = Brand::all();
        return view('admin.products.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  
        $data = [
            'name' => $request->input('name'),
            'brand_id' => $request->input('brand_id'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'description' => $request->input('description', ''),
            'status' => $request->input('status'),
        ];
        // Xử lý upload ảnh
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads', $filename, 'public');
            $data['image'] = $filename;
        }
        $product = Product::create($data);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        $brands = Brand::all();
        return view('admin.products.edit', compact('product', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $product->fill([
            'name' => $request->input('name'),
            'brand_id' => $request->input('brand_id'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'description' => $request->input('description', ''),
            'status' => $request->input('status')
        ]);
        // Xử lý upload ảnh
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads', $filename, 'public');
            $product->image = $filename;
        }
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
