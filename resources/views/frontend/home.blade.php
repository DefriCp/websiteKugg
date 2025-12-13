{{-- ============================================
     HOME PAGE (index.blade.php)
============================================ --}}
@extends('frontend.layout')

@section('title', $setting->site_name ?? 'Koperasi Usaha Gilang Gemilang')

@section('content')

@php
    $s = $setting ?? $globalSetting;
    $heroSlides = collect([
        $s?->hero_background      ?? null,
        $s?->hero_background_2    ?? null,
        $s?->hero_background_3    ?? null,
    ])
        ->filter()
        ->map(fn ($path) => asset('storage/'.$path))
        ->values()
        ->all();
@endphp

{{-- ===================== HERO SECTION ===================== --}}
<section id="beranda"
         class="relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white -mt-[72px]"
         x-data="heroSlider()">

    <div class="relative h-screen overflow-hidden">

        {{-- Background Slider --}}
        @if(count($heroSlides))
            <template x-for="(slide, index) in slides" :key="index">
                <div class="absolute inset-0 transition-opacity duration-1000 ease-out"
                     x-show="current === index"
                     x-transition.opacity>
                    <img :src="slide"
                         alt="Hero"
                         class="w-full h-full object-contain md:object-cover">
                </div>
            </template>
        @else
            <div class="absolute inset-0 bg-gradient-to-br from-slate-700 to-slate-900"></div>
        @endif

        {{-- Overlay Gradient --}}
        <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/60 to-transparent"></div>

        {{-- Animated Shapes --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-amber-400/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-emerald-400/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
        </div>

        {{-- Content --}}
        <div class="relative z-10 h-full flex items-center">
            <div class="max-w-6xl mx-auto px-6">
                <div data-aos="fade-right">
                    <p class="inline-block text-xs md:text-sm uppercase tracking-wider text-amber-300 mb-4 px-4 py-2 bg-amber-400/10 rounded-full border border-amber-400/30">
                        {{ $s?->tagline ?? 'Kredit Pensiunan • Cepat • Aman • Terpercaya' }}
                    </p>

                    <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6 max-w-3xl">
                        {{ $s?->hero_title ?? 'Selamat Datang di Koperasi Usaha Gilang Gemilang' }}
                    </h1>

                    <p class="text-base md:text-xl text-slate-100/90 mb-8 max-w-2xl leading-relaxed">
                        {{ $s?->hero_subtitle ?? 'Kami menyediakan layanan kredit pensiunan dengan bunga kompetitif dan proses yang cepat.' }}
                    </p>

                    <div class="flex flex-wrap items-center gap-4">
                        <a href="{{ route('pengajuan') }}"
                           class="group inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-amber-400 text-slate-900 font-bold hover:bg-amber-300 transition-all shadow-lg hover:shadow-amber-400/50 hover:scale-105">
                            Ajukan Kredit Sekarang
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>

                        <a href="{{ route('products') }}"
                           class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl border-2 border-white/60 text-white hover:bg-white/10 hover:border-white transition-all backdrop-blur-sm">
                            Lihat Produk
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Slider Indicators --}}
        @if(count($heroSlides) > 1)
        <div class="absolute inset-x-0 bottom-8 flex justify-center z-10">
            <div class="flex gap-3 bg-black/30 backdrop-blur-md px-4 py-3 rounded-full">
                <template x-for="(slide, index) in slides" :key="'dot-'+index">
                    <button
                        class="w-3 h-3 rounded-full border-2 border-white/60 transition-all duration-300"
                        :class="current === index ? 'bg-amber-400 border-amber-400 w-8' : 'bg-white/30 hover:bg-white/50'"
                        @click="current = index">
                    </button>
                </template>
            </div>
        </div>
        @endif

    </div>
</section>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('heroSlider', () => ({
            current: 0,
            slides: @json($heroSlides),
            next() {
                if (!this.slides.length) return;
                this.current = (this.current + 1) % this.slides.length;
            },
            init() {
                if (this.slides.length > 1) {
                    setInterval(() => this.next(), 5000);
                }
            },
        }))
    })
</script>

{{-- ===================== KENAPA HARUS ===================== --}}
<section class="py-20 bg-gradient-to-b from-white to-slate-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Kenapa Harus <span class="text-amber-500">Gilang Gemilang</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Keunggulan yang membuat kami menjadi pilihan terbaik untuk kebutuhan kredit Anda
            </p>
        </div>

        <div class="grid gap-8 md:grid-cols-3">
            @forelse($reasons as $i => $reason)
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden hover:-translate-y-2"
                     data-aos="fade-up"
                     data-aos-delay="{{ $i * 100 }}">
                    @if($reason->image)
                        <div class="aspect-[16/10] overflow-hidden bg-gradient-to-br from-amber-50 to-slate-50">
                            <img src="{{ asset('storage/'.$reason->image) }}"
                                 alt="{{ $reason->title }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                    @endif
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-3 text-gray-900 group-hover:text-amber-500 transition-colors">
                            {{ $reason->title }}
                        </h3>
                        @if($reason->description)
                            <p class="text-gray-600 leading-relaxed">
                                {{ $reason->description }}
                            </p>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-gray-500 col-span-3 text-center py-8">Belum ada data alasan.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- ===================== PRODUK KAMI ===================== --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Produk <span class="text-amber-500">Kami</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Berbagai produk kredit yang dirancang untuk memenuhi kebutuhan Anda
            </p>
        </div>

        <div class="grid gap-8 md:grid-cols-3">
            @forelse($products as $i => $product)
                <a href="{{ route('product.show', $product->id) }}"
                   class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden hover:-translate-y-2"
                   data-aos="zoom-in"
                   data-aos-delay="{{ $i * 100 }}">

                    @if($product->image)
                        <div class="aspect-[4/3] overflow-hidden bg-gradient-to-br from-amber-50 to-slate-50">
                            <img src="{{ asset('storage/'.$product->image) }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                    @endif

                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-3 text-gray-900 group-hover:text-amber-500 transition-colors">
                            {{ $product->name }}
                        </h3>
                        <p class="text-gray-600 line-clamp-3 mb-4">
                            {{ $product->short_description }}
                        </p>

                        <span class="inline-flex items-center gap-2 text-amber-600 font-semibold group-hover:gap-3 transition-all">
                            Lihat Selengkapnya
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </span>
                    </div>
                </a>
            @empty
                <p class="text-gray-500 col-span-3 text-center py-8">
                    Belum ada produk yang aktif.
                </p>
            @endforelse
        </div>
    </div>
</section>

{{-- ===================== BERITA & FOTO ===================== --}}
<section class="py-20 bg-gradient-to-b from-slate-50 to-white">
    <div class="max-w-7xl mx-auto px-4 space-y-12">
        {{-- Berita --}}
        <div data-aos="fade-up">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Berita Terkini</h2>
                    <p class="text-gray-600">Informasi dan berita terbaru dari Koperasi Gilang Gemilang</p>
                </div>
                <a href="{{ route('news.index') }}" class="text-amber-600 font-semibold hover:text-amber-700 flex items-center gap-2">
                    Lihat Semua
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            @if($news->isEmpty())
                <div class="text-center py-12 bg-white rounded-2xl shadow-sm">
                    <p class="text-gray-500">Belum ada berita.</p>
                </div>
            @else
                <div class="flex gap-6 overflow-x-auto pb-4 hide-scrollbar">
                    @foreach($news as $item)
                        @php
                            $tanggal = $item->published_at
                                ? $item->published_at->translatedFormat('d M Y')
                                : null;
                        @endphp

                        <a href="{{ route('news.show', $item) }}"
                           class="news-item flex-shrink-0 w-full sm:w-80 lg:w-96 bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all overflow-hidden group hover:-translate-y-1 {{ $loop->index >= 3 ? 'hidden' : '' }}">
                            @if($item->image)
                                <div class="aspect-[16/10] overflow-hidden bg-gradient-to-br from-amber-50 to-slate-50">
                                    <img
                                        src="{{ asset('storage/'.$item->image) }}"
                                        alt="{{ $item->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    >
                                </div>
                            @endif

                            <div class="p-6">
                                @if($tanggal)
                                    <div class="inline-flex items-center gap-2 text-xs text-amber-600 font-semibold mb-3 bg-amber-50 px-3 py-1 rounded-full">
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg>
                                        {{ $tanggal }}
                                    </div>
                                @endif

                                <h3 class="font-bold text-lg mb-2 line-clamp-2 text-gray-900 group-hover:text-amber-600 transition-colors">
                                    {{ $item->title }}
                                </h3>

                                <p class="text-sm text-gray-600 line-clamp-3">
                                    {{ \Illuminate\Support\Str::limit($item->excerpt ?? $item->body ?? '', 140) }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Foto Kegiatan --}}
        <div data-aos="fade-up">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Foto Kegiatan</h2>
                    <p class="text-gray-600">Dokumentasi kegiatan dan momen berharga kami</p>
                </div>
            </div>

            @if($galleries->isEmpty())
                <div class="text-center py-12 bg-white rounded-2xl shadow-sm">
                    <p class="text-gray-500">Belum ada foto kegiatan.</p>
                </div>
            @else
                <div class="flex gap-6 overflow-x-auto pb-4 hide-scrollbar">
                    @foreach($galleries as $photo)
                        @php
                            $tglFoto = $photo->published_at
                                ? $photo->published_at->translatedFormat('d M Y')
                                : null;
                        @endphp

                        <article
                            class="gallery-item flex-shrink-0 w-full sm:w-80 lg:w-96 bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all overflow-hidden group hover:-translate-y-1 {{ $loop->index >= 3 ? 'hidden' : '' }}"
                        >
                            <div class="aspect-[16/10] overflow-hidden bg-gradient-to-br from-amber-50 to-slate-50">
                                <img
                                    src="{{ asset('storage/'.$photo->image) }}"
                                    alt="{{ $photo->title }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                >
                            </div>

                            <div class="p-6">
                                @if($tglFoto)
                                    <div class="inline-flex items-center gap-2 text-xs text-amber-600 font-semibold mb-2 bg-amber-50 px-3 py-1 rounded-full">
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg>
                                        {{ $tglFoto }}
                                    </div>
                                @endif

                                @if($photo->title)
                                    <p class="text-sm font-semibold text-gray-900 line-clamp-2">
                                        {{ $photo->title }}
                                    </p>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <style>
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function setupRotator(selector, batchSize, intervalMs) {
                const items = Array.from(document.querySelectorAll(selector));
                if (items.length <= batchSize) return;

                let currentStart = 0;

                function showBatch() {
                    items.forEach((el, idx) => {
                        el.classList.add('hidden');
                        if (idx >= currentStart && idx < currentStart + batchSize) {
                            el.classList.remove('hidden');
                        }
                    });
                }

                showBatch();
                setInterval(() => {
                    currentStart += batchSize;
                    if (currentStart >= items.length) currentStart = 0;
                    showBatch();
                }, intervalMs);
            }

            setupRotator('.news-item', 3, 5000);
            setupRotator('.gallery-item', 3, 5000);
        });
    </script>
</section>

@endsection