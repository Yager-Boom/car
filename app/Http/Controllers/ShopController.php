<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Article;
use App\Models\About;

class ShopController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('active', true)->orderBy('sort_order')->get();
        $products = Product::where('active', true)->orderBy('sort_order')->get();
        
        return view('shop.index', compact('sliders', 'products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $related_products = Product::where('active', true)
            ->where('id', '!=', $id)
            ->orderBy('sort_order')
            ->take(4)
            ->get();
        
        return view('shop.product', compact('product', 'related_products'));
    }

    public function articles()
    {
        $articles = Article::where('active', true)->orderBy('sort_order')->paginate(12);
        
        return view('shop.articles', compact('articles'));
    }

    public function article($id)
    {
        $article = Article::findOrFail($id);
        
        return view('shop.article', compact('article'));
    }

    public function about()
    {
        $about = About::first();
        
        return view('shop.about', compact('about'));
    }
}
