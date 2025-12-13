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

        $galleries = Gallery::latest()
            ->limit(10)
            ->get();

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
        $setting = SiteSetting::first();

        /**
         * =========================
         * TENTANG KAMI
         * (informasi_umum, visi, misi)
         * =========================
         */
        $about = Reason::where('type', 'about')
            ->orderBy('sort_order')
            ->get()
            ->groupBy('key');

        /**
         * =========================
         * KENAPA HARUS GILANG GEMILANG
         * =========================
         */
        $whyReasons = Reason::where('type', 'why')
            ->orderBy('sort_order')
            ->get();

        /**
         * =========================
         * STRUKTUR MANAJEMEN
         * =========================
         */
        $managements = Reason::where('type', 'management')
            ->orderBy('sort_order')
            ->get();

        /**
         * =========================
         * SEO JSON-LD (AMAN, MVC)
         * =========================
         */
        $aboutSeo = $about['informasi_umum'][0] ?? null;

        $seoJsonLd = json_encode([
            "@context" => "https://schema.org",
            "@type" => "Cooperative",
            "name" => $setting->site_name ?? 'Koperasi Usaha Gilang Gemilang',
            "url" => url('/'),
            "logo" => $setting?->logo ? asset('storage/'.$setting->logo) : null,
            "description" => strip_tags(optional($aboutSeo)->description),
            "address" => [
                "@type" => "PostalAddress",
                "streetAddress" => $setting->address ?? '',
                "addressCountry" => "ID"
            ],
            "contactPoint" => [
                "@type" => "ContactPoint",
                "telephone" => $setting->phone ?? '',
                "contactType" => "customer service"
            ]
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        return view('frontend.about', compact(
            'setting',
            'about',
            'whyReasons',
            'managements',
            'seoJsonLd'
        ));
    }

    // =======================
    // PRODUK - LIST
    // =======================
    public function products()
    {
        $products = Product::where('is_active', true)
            ->orderByDesc('created_at')
            ->get();

        return view('frontend.products', compact('products'));
    }

    // =======================
    // PRODUK - DETAIL
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
