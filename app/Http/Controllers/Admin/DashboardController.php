<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Article;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'products' => Product::count(),
            'sliders' => Slider::count(),
            'articles' => Article::count(),
            'users' => User::count(),
        ];
        
        $recent_products = Product::latest()->take(5)->get();
        
        return view('admin.dashboard', compact('stats', 'recent_products'));
    }
}
