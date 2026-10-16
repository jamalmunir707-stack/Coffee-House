<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Order;
class OrderController extends Controller { public function track(string $token){ $order=Order::with('items')->where('public_token',$token)->firstOrFail(); return view('orders.track',compact('order')); } }
