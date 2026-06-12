<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        // show latest products on dashboard with pagination
        $products = Product::orderBy('_id', 'desc')->paginate(8);

        // low-stock items for the side panel (few lowest stok values)
        $lowStockProducts = Product::orderBy('stok', 'asc')->limit(3)->get();
        $maxStock = Product::max('stok') ?: 1;

        // dynamic stats for grid
        $totalProducts = Product::count();
        $totalStockValue = Product::all()->sum(function($p) { return $p->harga * $p->stok; });
        $productsOutOfStock = Product::where('stok', 0)->count();
        $uniqueCategories = Product::distinct('kategori')->count();

        return view('dashboard', compact('products', 'lowStockProducts', 'maxStock', 'totalProducts', 'totalStockValue', 'productsOutOfStock', 'uniqueCategories'));
    }
}
