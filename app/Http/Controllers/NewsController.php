<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    // daftar semua berita (kalau mau ada halaman /berita)
    public function index()
    {
        $news = News::where('is_published', true)
            ->orderByDesc('published_at')
            ->paginate(9);

        return view('frontend.news.index', compact('news'));
    }

    // detail satu berita
    public function show(News $news)
    {
        // kalau belum dipublish, jangan boleh dibuka
        abort_if(!$news->is_published, 404);

        return view('frontend.news.show', compact('news'));
    }
}
