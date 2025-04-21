<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Distributor;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalDistributors = Distributor::count();

        return view('dashboard', compact('totalProducts', 'totalCategories', 'totalDistributors'));
    }
}