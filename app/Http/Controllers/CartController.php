<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Product; use Illuminate\Http\Request;
class CartController extends Controller {
 public function index(){ $cart=session('cart',[]); return view('cart.index',compact('cart')); }
 public function store(Request $r){
  $d=$r->validate(['product_id'=>'required|integer|exists:products,id','quantity'=>'nullable|integer|min:1|max:20']);
  $p=Product::where('is_available',true)->findOrFail($d['product_id']); $cart=session('cart',[]); $k=(string)$p->id; $qty=(int)($d['quantity']??1);
  if(isset($cart[$k])) $cart[$k]['quantity']=min(20,$cart[$k]['quantity']+$qty);
  else $cart[$k]=['product_id'=>$p->id,'name'=>$p->name,'price'=>(float)$p->price,'quantity'=>$qty,'image'=>$p->image];
  session(['cart'=>$cart]); return redirect()->route('cart.index')->with('success','تمت إضافة المنتج.');
 }
 public function update(Request $r,string $key){ $d=$r->validate(['quantity'=>'required|integer|min:1|max:20']); $c=session('cart',[]); abort_unless(isset($c[$key]),404); $c[$key]['quantity']=$d['quantity']; session(['cart'=>$c]); return back()->with('success','تم تحديث الكمية.'); }
 public function destroy(string $key){ $c=session('cart',[]); unset($c[$key]); session(['cart'=>$c]); return back()->with('success','تم حذف المنتج.'); }
 public function clear(){ session()->forget('cart'); return redirect()->route('cart.index')->with('success','تم إفراغ السلة.'); }
}
