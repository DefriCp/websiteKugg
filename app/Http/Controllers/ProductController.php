<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * TAMPILKAN LIST PRODUK
     * GET /produk
     */
    public function index()
    {
        $products = Product::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.products', compact('products'));
    }

    /**
     * TAMPILKAN DETAIL PRODUK
     * GET /produk/{id}
     */
    public function show($id)
    {
        $product = Product::where('id', $id)
            ->where('is_active', true)
            ->firstOrFail();

        return view('frontend.product-show', compact('product'));
    }
}
