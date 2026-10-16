<?php
namespace App\Http\Controllers\Admin;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryController{
 public function index(){ $categories=Category::withCount('products')->orderBy('sort_order')->paginate(15); return view('admin.categories.index',compact('categories')); }
 public function create(){ $category=new Category(); return view('admin.categories.form',compact('category')); }
 public function store(Request $r){ $d=$this->validated($r); $d['slug']=Str::slug($d['name']).'-'.Str::lower(Str::random(4)); Category::create($d); return redirect()->route('admin.categories.index')->with('success','تم إنشاء التصنيف.'); }
 public function edit(Category $category){ return view('admin.categories.form',compact('category')); }
 public function update(Request $r,Category $category){ $d=$this->validated($r); $d['slug']=Str::slug($d['name']).'-'.Str::lower(Str::random(4)); $category->update($d); return redirect()->route('admin.categories.index')->with('success','تم تحديث التصنيف.'); }
 public function destroy(Category $category){ if($category->products()->exists()) return back()->withErrors(['category'=>'لا يمكن حذف تصنيف يحتوي على منتجات.']); $category->delete(); return back()->with('success','تم حذف التصنيف.'); }
 private function validated(Request $r): array { $d=$r->validate(['name'=>'required|string|max:120','description'=>'nullable|string|max:1000','sort_order'=>'nullable|integer|min:0','is_active'=>'nullable|boolean']); $d['sort_order']=$r->integer('sort_order'); $d['is_active']=$r->boolean('is_active'); return $d; }
}
