<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products.index', ["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create-product');
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        Gate::authorize('create-product');
        request()->validate([
            'name' => ['required', 'min:5', 'max:100'],
            'price' => ['required', 'numeric'],
            'short_desc' => ['required', 'string'],
            'long_desc' => [''],
            'product_image' => [
                'nullable',
                'image',
                'mimes:jpg,png',
                'max:2048'
            ],
            // 'featured' => ['boolean'],
        ]);

        // 2. Handle image
        $path = null;

        if (request()->hasFile('product_image')) {
            $path = request()->file('product_image')->store('products', 'public');
        }

        // 3. Create
        Product::create([
            'name' => request('name'),
            'price' => request('price'),
            'short_desc' => request('short_desc'),
            'long_desc' => request('long_desc'),
            'featured' => request()->has('featured'),
            'product_image' => $path,
        ]);

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', ["product" => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // ADDED
        $this->authorize('update', $product);
        return view('products.edit', ["product" => $product]);   //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Product $product)
    {
        // ADDED
        $this->authorize('update', $product);
        request()->validate([
            'name' => ['required', 'min:5', 'max:100'],
            'price' => ['required', 'numeric'],
            'short_desc' => ['required', 'string'],
            'long_desc' => [''],
            'product_image' => [
                'nullable',
                'image',
                'mimes:jpg,png',
                'max:2048'
            ],
            // 'featured' => ['boolean'],
        ]);

        // 2. Handle image
        $path = $product->product_image;

        if (request()->hasFile('product_image')) {

            if ($product->product_image) {
                Storage::disk('public')->delete($product->product_image);
            }

            $path = request()->file('product_image')->store('products', 'public');
        }

        // 3. Create
        $product->update([
            'name' => request('name'),
            'price' => request('price'),
            'short_desc' => request('short_desc'),
            'long_desc' => request('long_desc'),
            'featured' => request()->has('featured'),
            'product_image' => $path,
        ]);

        return redirect('/products/' . $product->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // ADDED
        $this->authorize('delete', $product);
        $product->delete();
        return redirect('/products');
    }
}
