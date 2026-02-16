<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function index()
{
    $orders = \App\Models\Order::where('user_id', auth()->id())
        ->with('items.product')
        ->latest()
        ->get();

    return view('orders.index', compact('orders'));
}

    public function store()
    {
        $cart = Cart::where('user_id', Auth::id())
            ->with('items.product')
            ->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Cart is empty.');
        }

        // Calculate total
        $total = $cart->items->sum(function ($item) {
            return $item->price * $item->quantity ?? $item->product->price * $item->quantity;
        });

        // Create order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
        ]);

        // Move cart items → order items
        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        // Clear cart
        $cart->items()->delete();

        return redirect()->route('cart.index')->with('success', 'Order placed successfully!');
    }
}
