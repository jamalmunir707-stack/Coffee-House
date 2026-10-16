<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Routing\Controller;

class PageController extends Controller
{
    public function home()
    {
        $featuredProducts = Product::where('is_available', true)->where('is_featured', true)->take(4)->get();
        $categories = Category::all();
        return view('home', compact('featuredProducts', 'categories'));
    }

    public function about()
    {
        return view('about');
    }

    public function gallery()
    {
        return view('gallery');
    }
}