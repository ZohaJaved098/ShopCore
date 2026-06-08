<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // SHOW ORDER HISTORY
    public function index()
    {
        $orders = Order::with('items.product')
            ->where('user_id', Auth::id())
            ->get();

        return view('orders.index', compact('orders'));
    }

    // PLACE ORDER
    public function store()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return back();
        }

        $total = 0;

        foreach ($cartItems as $item) {
            $total += $item->product->price * $item->quantity;
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $total,
        ]);

        foreach ($cartItems as $item) {

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        // CLEAR CART AFTER ORDER
        Cart::where('user_id', Auth::id())->delete();

        return redirect('/orders');
    }
}
