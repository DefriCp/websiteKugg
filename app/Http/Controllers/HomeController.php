<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\Reason;
use App\Models\Product;
use App\Models\News;
use App\Models\Gallery;

class HomeController extends Controller
{
    // BERANDA
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
            'galleries',
        ));
    }

    // TENTANG KAMI
    public function about()
    {   
        $aboutReason = Reason::where('type', 'about')->first();
        $reasons = Reason::where('type', 'why')->orderBy('sort_order')->get();
        return view('frontend.about', compact('aboutReason', 'reasons'));
    }

    // PRODUK
    public function products()
    {
        $products = Product::where('is_active', true)->get();

        return view('frontend.products', compact('products'));
    }

    // PENGAJUAN KREDIT
    public function pengajuan()
    {
        // kalau perlu data tambahan, kirim di sini.
        return view('frontend.pengajuan');
    }
}
