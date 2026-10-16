<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\ContactMessage; use Illuminate\Http\Request;
class ContactController extends Controller {
 public function show(){ return view('contact'); }
 public function store(Request $r){ $d=$r->validate(['name'=>'required|string|max:120','email'=>'required|email|max:190','phone'=>'nullable|string|max:30','subject'=>'required|string|max:160','message'=>'required|string|max:3000']); ContactMessage::create($d+['status'=>'new']); return back()->with('success','تم استلام رسالتك.'); }
}
