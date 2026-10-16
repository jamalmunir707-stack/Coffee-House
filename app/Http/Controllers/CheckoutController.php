<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Order; use App\Models\OrderItem; use App\Models\Product;
use Illuminate\Http\Request; use Illuminate\Support\Facades\DB; use Illuminate\Support\Str;
class CheckoutController extends Controller {
 public function show(){ $cart=session('cart',[]); if (empty($cart)) return redirect()->route('menu.index')->with('error','السلة فارغة.'); $subtotal=collect($cart)->sum(fn($i)=>$i['price']*$i['quantity']); return view('checkout.index',compact('cart','subtotal')); }
 public function store(Request $r){
  $d=$r->validate(['customer_name'=>'required|string|max:120','customer_phone'=>'required|string|max:30','customer_email'=>'nullable|email|max:190','order_type'=>'required|in:pickup,dine_in','payment_method'=>'required|in:cash','notes'=>'nullable|string|max:1000']);
  $cart=session('cart',[]); if(!$cart) return redirect()->route('menu.index')->with('error','السلة فارغة.');
  $order=DB::transaction(function() use($d,$cart){
   $subtotal=0; $lines=[];
   foreach($cart as $i){ $p=Product::where('is_available',true)->lockForUpdate()->findOrFail($i['product_id']); $qty=max(1,min(20,(int)$i['quantity'])); $price=(float)$p->price; $line=round($price*$qty,2); $subtotal+=$line; $lines[]=[$p,$qty,$price,$line]; }
   $o=Order::create($d+['public_token'=>Str::random(48),'status'=>'Pending','payment_status'=>'unpaid','subtotal'=>$subtotal,'discount_total'=>0,'tax_total'=>0,'total'=>$subtotal]);
   foreach($lines as [$p,$qty,$price,$line]) $o->items()->create(['product_id'=>$p->id,'product_name'=>$p->name,'unit_price'=>$price,'quantity'=>$qty,'line_total'=>$line]);
   return $o;
  });
  session()->forget('cart'); return redirect()->route('orders.track',$order->public_token)->with('success','تم استلام طلبك.');
 }
}
