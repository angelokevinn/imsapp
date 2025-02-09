<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.goods', ['products' => $products]);
    }

    // funtion to route create page
    public function create()
    {
        return view('products.create');
    }

    // funtion to store data
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:1',
            'description' => 'required|string|max:255',
            'purchase_date' => 'required|date',
        ]);

        $data['name'] = strtoupper($data['name']);
        $data['description'] = strtoupper($data['description']);

        $newProduct = Product::create($data);

        return redirect()->route('product.index')
            ->with('success', 'Product created successfully.');
    }

    // funtion to route edit page
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    // funtion to update data
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:1',
            'description' => 'required|string|max:255',
            'purchase_date' => 'required|date',
        ]);

        $product->update($data);

        return redirect()->route('product.index')
            ->with('success', 'Product updated successfully.');
    }

    // funtion to delete data
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')
            ->with('success', 'Product deleted successfully.');
    }
}
