<?php
namespace App\Http\Controllers\Admin;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class OrderController{
 public function index(Request $r){ $orders=Order::when($r->filled('status'),fn($q)=>$q->where('status',$r->string('status')))->latest()->paginate(20)->withQueryString(); return view('admin.orders.index',compact('orders')); }
 public function show(Order $order){ $order->load('items'); return view('admin.orders.show',compact('order')); }
 public function updateStatus(Request $r,Order $order){
  $d=$r->validate(['status'=>['required',Rule::in(['Pending','Preparing','Ready','Completed','Cancelled'])]]);
  $allowed=['Pending'=>['Preparing','Cancelled'],'Preparing'=>['Ready','Cancelled'],'Ready'=>['Completed','Cancelled'],'Completed'=>[],'Cancelled'=>[]];
  if(!in_array($d['status'],$allowed[$order->status]??[],true)) return back()->withErrors(['status'=>'الانتقال بين هذه الحالات غير مسموح.']);
  $order->update(['status'=>$d['status']]); return back()->with('success','تم تحديث حالة الطلب.');
 }
}
