<?php
namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController{
 public function index(){ $products=Product::with('category')->latest()->paginate(15); return view('admin.products.index',compact('products')); }
 public function create(){ $categories=Category::orderBy('name')->get(); $product=new Product(); return view('admin.products.form',compact('categories','product')); }
 public function store(Request $r){ $d=$this->validated($r); if($r->hasFile('image')) $d['image']=$r->file('image')->store('products','public'); $d['slug']=Str::slug($d['name']).'-'.Str::lower(Str::random(5)); Product::create($d); return redirect()->route('admin.products.index')->with('success','تم إنشاء المنتج.'); }
 public function edit(Product $product){ $categories=Category::orderBy('name')->get(); return view('admin.products.form',compact('categories','product')); }
 public function update(Request $r,Product $product){ $d=$this->validated($r); if($r->hasFile('image')){ if($product->image) Storage::disk('public')->delete($product->image); $d['image']=$r->file('image')->store('products','public'); } $d['slug']=Str::slug($d['name']).'-'.Str::lower(Str::random(5)); $product->update($d); return redirect()->route('admin.products.index')->with('success','تم تحديث المنتج.'); }
 public function destroy(Product $product){ $product->delete(); return back()->with('success','تم حذف المنتج.'); }
 private function validated(Request $r): array {
  $d=$r->validate(['name'=>'required|string|max:160','category_id'=>'required|exists:categories,id','description'=>'nullable|string|max:2000','price'=>'required|numeric|min:0|max:999999','cost_price'=>'nullable|numeric|min:0|max:999999','image'=>'nullable|image|max:2048','is_available'=>'nullable|boolean','is_featured'=>'nullable|boolean']);
  $d['is_available']=$r->boolean('is_available'); $d['is_featured']=$r->boolean('is_featured'); return $d;
 }
}
