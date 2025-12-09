@extends('frontend.layout')

@section('title', $setting->site_name ?? 'Koperasi Usaha Gilang Gemilang')

@section('content')

@php
    // Pakai satu sumber: setting yg dikirim controller,
    // fallback ke globalSetting dari AppServiceProvider
    $s = $setting ?? $globalSetting;

    // Ambil path gambar hero dari database (hanya yang terisi),
    // lalu langsung diubah jadi URL full menggunakan asset().
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

{{-- =================================================================== --}}
{{-- =============== HERO SECTION (SLIDER ELEGAN) ====================== --}}
{{-- =================================================================== --}}
<section id="beranda"
         class="relative bg-slate-900 text-white"
         x-data="heroSlider()">

    <div class="relative h-[420px] md:h-[520px] overflow-hidden">

        {{-- Background gambar (slider) --}}
        @if(count($heroSlides))
            <template x-for="(slide, index) in slides" :key="index">
                <div class="absolute inset-0 transition-opacity duration-700 ease-out"
                     x-show="current === index"
                     x-transition.opacity>
                    <img :src="slide"
                         alt="Hero"
                         class="w-full h-full object-cover">
                </div>
            </template>
        @else
            {{-- Fallback kalau belum ada gambar hero --}}
            <div class="absolute inset-0 bg-slate-600"></div>
        @endif

        {{-- Overlay gradient supaya teks tetap kebaca --}}
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-black/20"></div>

        {{-- Konten teks --}}
        <div class="relative z-10 h-full flex items-center">
            <div class="max-w-5xl mx-auto px-6">
                <p class="text-xs md:text-sm uppercase tracking-[0.25em] text-amber-300 mb-3">
                    {{ $s?->tagline ?? 'Kredit Pensiunan • Cepat • Aman • Terpercaya' }}
                </p>

                <h1 class="text-3xl md:text-5xl font-extrabold leading-tight mb-4">
                    {{ $s?->hero_title ?? 'Selamat Datang di Koperasi Usaha Gilang Gemilang' }}
                </h1>

                <p class="text-base md:text-lg text-slate-100/90 mb-6 max-w-2xl">
                    {{ $s?->hero_subtitle ?? 'Kami menyediakan layanan kredit pensiunan dengan bunga kompetitif dan proses yang cepat.' }}
                </p>

                <div class="flex flex-wrap items-center gap-3">
                    <a href="{{ route('pengajuan') }}"
                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-amber-400 text-slate-900 text-sm md:text-base font-semibold shadow-lg hover:bg-amber-300 transition">
                        Ajukan Kredit Sekarang
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </a>

                    <a href="{{ route('products') }}"
                       class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-white/60 text-sm md:text-base font-medium text-white/90 hover:bg-white/10 transition">
                        Lihat Produk
                    </a>
                </div>
            </div>
        </div>

        {{-- Bullet indikator + panah, hanya muncul kalau slide > 1 --}}
        <div class="absolute inset-x-0 bottom-5 flex items-center justify-center">
            @if(count($heroSlides) > 1)
                <div class="flex items-center gap-4">

                    <button type="button"
                            class="w-8 h-8 rounded-full border border-white/60 flex items-center justify-center bg-black/30 hover:bg-black/50 backdrop-blur"
                            @click="prev()">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m15 18-6-6 6-6"></path>
                        </svg>
                    </button>

                    <div class="flex gap-2">
                        <template x-for="(slide, index) in slides" :key="'dot-'+index">
                            <button type="button"
                                    class="w-2.5 h-2.5 rounded-full border border-white/60"
                                    :class="current === index ? 'bg-emerald-400' : 'bg-white/30'"
                                    @click="current = index">
                            </button>
                        </template>
                    </div>

                    <button type="button"
                            class="w-8 h-8 rounded-full border border-white/60 flex items-center justify-center bg-black/30 hover:bg-black/50 backdrop-blur"
                            @click="next()">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </button>

                </div>
            @endif
        </div>
    </div>
</section>

{{-- Alpine data untuk slider hero --}}
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('heroSlider', () => ({
            current: 0,
            slides: @json($heroSlides),
            next() {
                if (!this.slides.length) return;
                this.current = (this.current + 1) % this.slides.length;
            },
            prev() {
                if (!this.slides.length) return;
                this.current = (this.current - 1 + this.slides.length) % this.slides.length;
            },
            init() {
                if (this.slides.length > 1) {
                    setInterval(() => this.next(), 5000);
                }
            },
        }))
    })
</script>

{{-- =================================================================== --}}
{{-- ================== KENAPA HARUS GILANG GEMILANG ==================== --}}
{{-- =================================================================== --}}
<section class="py-10 bg-white">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h2 class="text-2xl font-bold mb-6">Kenapa harus Gilang Gemilang ?</h2>

        <div class="grid gap-6 md:grid-cols-3">
            @forelse($reasons as $reason)
                <div class="shadow rounded-lg overflow-hidden bg-white">
                    @if($reason->image)
                        <img src="{{ asset('storage/'.$reason->image) }}"
                             alt="{{ $reason->title }}"
                             class="w-full h-56 object-cover">
                    @endif
                    <div class="p-4 text-left">
                        <h3 class="font-semibold text-lg mb-2">{{ $reason->title }}</h3>
                        @if($reason->description)
                            <p class="text-sm text-slate-600">{{ $reason->description }}</p>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-sm text-slate-500">Belum ada data alasan.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- =================================================================== --}}
{{-- ======================== PRODUK KAMI =============================== --}}
{{-- =================================================================== --}}
<section class="py-10 bg-slate-50">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h2 class="text-2xl font-bold mb-6">Produk Kami</h2>

        <div class="grid gap-6 md:grid-cols-3">
            @forelse($products as $product)
                <a href="{{ route('product.show', $product->id) }}"
                   class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition text-left block">

                    @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}"
                             alt="{{ $product->name }}"
                             class="w-full h-72 object-cover">
                    @endif

                    <div class="p-4">
                        <h3 class="font-semibold mb-2">
                            {{ $product->name }}
                        </h3>
                        <p class="text-sm text-slate-600 line-clamp-3">
                            {{ $product->short_description }}
                        </p>

                        <span class="mt-3 inline-block text-emerald-700 text-xs font-medium">
                            Lihat Selengkapnya →
                        </span>
                    </div>
                </a>
            @empty
                <p class="text-sm text-slate-500 col-span-3">
                    Belum ada produk yang aktif.
                </p>
            @endforelse
        </div>
    </div>
</section>

{{-- =================================================================== --}}
{{-- ================== BERITA & FOTO KEGIATAN ========================== --}}
{{-- =================================================================== --}}
<section class="py-10 bg-slate-50">
    <div class="max-w-6xl mx-auto px-4 space-y-8">
        {{-- Berita --}}
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="px-5 pt-5 pb-3 border-b">
                <h2 class="text-xl font-bold">Berita Koperasi Gemilang</h2>
            </div>

            @if($news->isEmpty())
                <div class="p-5 text-sm text-slate-500">
                    Belum ada berita.
                </div>
            @else
                <div class="p-5 min-h-[320px]">
                    <div class="flex gap-4 overflow-hidden">
                        @foreach($news as $item)
                            @php
                                $tanggal = $item->published_at
                                    ? $item->published_at->translatedFormat('l, d F Y')
                                    : null;
                            @endphp

                            <a href="{{ route('news.show', $item) }}"
                               class="news-item flex-shrink-0 w-full sm:w-64 lg:w-72 bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-md transition-shadow {{ $loop->index >= 3 ? 'hidden' : '' }}">
                                @if($item->image)
                                    <div class="aspect-[4/3] overflow-hidden">
                                        <img
                                            src="{{ asset('storage/'.$item->image) }}"
                                            alt="{{ $item->title }}"
                                            class="w-full h-full object-cover"
                                        >
                                    </div>
                                @endif

                                <div class="p-4">
                                    @if($tanggal)
                                        <div class="flex items-center text-[11px] text-slate-500 mb-2">
                                            <svg
                                                class="w-4 h-4 mr-1"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="1.8"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            >
                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                            </svg>
                                            <span>{{ $tanggal }}</span>
                                        </div>
                                    @endif

                                    <h3 class="text-sm font-semibold mb-1 line-clamp-2">
                                        {{ $item->title }}
                                    </h3>

                                    <p class="text-xs text-slate-600 line-clamp-3">
                                        {{ \Illuminate\Support\Str::limit($item->excerpt ?? $item->body ?? '', 140) }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        {{-- Foto kegiatan --}}
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="px-5 pt-5 pb-3 border-b">
                <h2 class="text-xl font-bold">Foto Kegiatan</h2>
            </div>

            @if($galleries->isEmpty())
                <div class="p-5 text-sm text-slate-500">
                    Belum ada foto kegiatan.
                </div>
            @else
                <div class="p-5 min-h-[320px]">
                    <div class="flex gap-4 overflow-hidden">
                        @foreach($galleries as $photo)
                            @php
                                $tglFoto = $photo->published_at
                                    ? $photo->published_at->translatedFormat('l, d F Y')
                                    : null;
                            @endphp

                            <article
                                class="gallery-item flex-shrink-0 w-full sm:w-64 lg:w-72 bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden {{ $loop->index >= 3 ? 'hidden' : '' }}"
                            >
                                <div class="aspect-[4/3] overflow-hidden">
                                    <img
                                        src="{{ asset('storage/'.$photo->image) }}"
                                        alt="{{ $photo->title }}"
                                        class="w-full h-full object-cover"
                                    >
                                </div>

                                <div class="p-3">
                                    @if($tglFoto)
                                        <p class="text-[11px] text-slate-500 mb-1">
                                            {{ $tglFoto }}
                                        </p>
                                    @endif

                                    @if($photo->title)
                                        <p class="text-xs font-semibold text-slate-700 line-clamp-2">
                                            {{ $photo->title }}
                                        </p>
                                    @endif
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    {{-- Rotasi kartu berita & galeri (3 item per 5 detik) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function setupRotator(selector, batchSize, intervalMs) {
                const items = Array.from(document.querySelectorAll(selector));
                if (items.length <= batchSize) {
                    return;
                }

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
                    if (currentStart >= items.length) {
                        currentStart = 0;
                    }
                    showBatch();
                }, intervalMs);
            }

            setupRotator('.news-item', 3, 5000);
            setupRotator('.gallery-item', 3, 5000);
        });
    </script>
</section>

@endsection
