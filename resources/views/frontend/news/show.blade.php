@extends('frontend.layout')

@section('title', $news->title . ' - Berita')

@section('content')
<section class="py-10 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4">
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4 md:p-6">

            {{-- Judul --}}
            <h1 class="text-2xl md:text-3xl font-bold mb-3 md:mb-4 leading-snug">
                {{ $news->title }}
            </h1>

            {{-- Meta --}}
            <div class="flex flex-wrap items-center text-[11px] md:text-xs text-slate-500 gap-3 mb-4 md:mb-5">
                @if($news->category)
                    <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-slate-100 text-slate-700">
                        {{ $news->category }}
                    </span>
                @endif

                @if($news->published_at)
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.8"
                             stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                        </svg>
                        <span>{{ $news->published_at->translatedFormat('l, d F Y') }}</span>
                    </div>
                @endif

                <span>•</span>
                <span>admin</span> {{-- kalau ada kolom author, ganti di sini --}}
            </div>

            <hr class="border-slate-100 mb-4 md:mb-5">

            {{-- Tombol share --}}
            @php
                $url  = urlencode(url()->current());
                $text = urlencode($news->title);
            @endphp

            <div class="flex flex-wrap gap-2 mb-6 text-xs">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}"
                   target="_blank"
                   class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-[#1877F2] text-white font-semibold shadow-sm">
                    Facebook
                </a>
                <a href="https://api.whatsapp.com/send?text={{ $text }}%20{{ $url }}"
                   target="_blank"
                   class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-[#25D366] text-white font-semibold shadow-sm">
                    WhatsApp
                </a>
                <a href="https://www.instagram.com/gemilangkoperasi/url?url={{ $url }}&text={{ $text }}"
                   target="_blank"
                   class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-[#0088cc] text-white font-semibold shadow-sm">
                    instagram
                </a>
                <a href="mailto:?subject={{ $text }}&body={{ $url }}"
                   class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-red-500 text-white font-semibold shadow-sm">
                    Email
                </a>
            </div>

            {{-- Gambar utama --}}
            @if($news->image)
                <div class="mb-6">
                    <img src="{{ asset('storage/'.$news->image) }}"
                         alt="{{ $news->title }}"
                         class="w-full max-h-[480px] object-cover rounded-lg">
                </div>
            @endif

            {{-- ==== ISI BERITA ==== --}}
            @php
                // Isi berita dari kolom content (RichEditor Filament sudah menghasilkan HTML <p>...</p>)
                $body = $news->content ?? '';
            @endphp

            <article class="mt-2 text-sm md:text-base text-slate-800">
                <div class="space-y-4 leading-relaxed md:leading-7 text-justify">
                    {!! $body !!}
                </div>
            </article>

        </div>
    </div>
</section>
@endsection
