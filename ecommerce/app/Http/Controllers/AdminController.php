<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalOrders   = Order::count();
        $totalRevenue  = Order::sum('total');

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalOrders',
            'totalRevenue'
        ));
    }
}
