<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // show wishlist
    public function index()
    {
        $items = Wishlist::with('product')
            ->where('user_id', Auth::id())
            ->get();

        return view('products.wishlist', compact('items'));
    }

    // add
    public function store(Product $product)
    {
        $exists = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->exists();

        if (!$exists) {
            Wishlist::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id
            ]);
        }

        return back();
    }

    // remove
    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();

        return back();
    }
    public function removeByProduct(Product $product)
    {
        Wishlist::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->delete();

        return back();
    }
}
