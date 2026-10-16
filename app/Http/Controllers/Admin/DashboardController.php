<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;

class DashboardController
{
    public function index()
    {
        $sales = Order::where('payment_status', 'paid')->where('status', '!=', 'cancelled')->sum('total');
        $ordersCount = Order::count();
        $pendingCount = Order::where('status', 'pending')->count();
        $productsCount = Product::count();
        $recentOrders = Order::latest()->take(5)->get();

        return view('admin.dashboard', compact('sales', 'ordersCount', 'pendingCount', 'productsCount', 'recentOrders'));
    }
}