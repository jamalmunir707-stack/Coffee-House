<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Product; use App\Models\Category; use Illuminate\Http\Request;
class MenuController extends Controller {
 public function index(Request $request){
  $categories=Category::where('is_active',true)->orderBy('sort_order')->get();
  $products=Product::with('category')->where('is_available',true)
   ->when($request->filled('category'),fn($q)=>$q->where('category_id',$request->integer('category')))
   ->when($request->filled('q'),fn($q)=>$q->where('name','like','%'.$request->string('q').'%'))
   ->orderBy('name')->paginate(12)->withQueryString();
  return view('menu.index',compact('categories','products'));
 }
 public function show(Product $product){ abort_unless($product->is_available,404); return view('menu.show',compact('product')); }
}
