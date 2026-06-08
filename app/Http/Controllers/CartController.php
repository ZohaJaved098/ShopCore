<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // SHOW CART
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        return view('products.cart', compact('cartItems'));
    }

    // ADD TO CART
    public function add(Product $product)
    {
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return back();
    }

    // REMOVE ITEM
    public function remove(Cart $cart)
    {
        $cart->delete();

        return back();
    }

    // UPDATE QTY
    public function update(Cart $cart)
    {
        $quantity = request('quantity');

        if ($quantity <= 0) {
            $cart->delete();

            return back();
        }

        $cart->update([
            'quantity' => $quantity
        ]);

        return back();
    }
}
