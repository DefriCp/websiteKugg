<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\Reason;
use App\Models\Product;
use App\Models\News;
use App\Models\Gallery;

class HomeController extends Controller
{
    // =======================
    // BERANDA
    // =======================
    public function index()
    {
        $setting   = SiteSetting::first();
        $reasons   = Reason::where('type', 'why')
                            ->orderBy('sort_order')
                            ->get();
        $products  = Product::where('is_active', true)->get();
        $news      = News::where('is_published', true)
                          ->orderByDesc('published_at')
                          ->limit(10)
                          ->get();
        $galleries = Gallery::latest()->limit(10)->get();

        return view('frontend.home', compact(
            'setting',
            'reasons',
            'products',
            'news',
            'galleries'
        ));
    }

    // =======================
    // TENTANG KAMI
    // =======================
    public function about()
    {
        $aboutReason = Reason::where('type', 'about')->first();
        $reasons     = Reason::where('type', 'why')->orderBy('sort_order')->get();

        return view('frontend.about', compact('aboutReason', 'reasons'));
    }

    // =======================
    // PRODUK - LIST
    // =======================
    public function products()
    {
        $products = Product::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.products', compact('products'));
    }

    // =======================
    // PRODUK - DETAIL (SHOW)
    // route: /produk/{product}
    // =======================
    public function productShow(Product $product)
    {
        if (! $product->is_active) {
            abort(404);
        }

        return view('frontend.product-show', compact('product'));
    }

    // =======================
    // PENGAJUAN KREDIT
    // =======================
    public function pengajuan()
    {
        return view('frontend.pengajuan');
    }
}
