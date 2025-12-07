@extends('frontend.layout')

@section('title', $setting->site_name ?? 'Koperasi Usaha Gilang Gemilang')

@section('content')

{{-- ===== Hero Section ===== --}}
<section id="beranda" class="relative">
    <div class="relative">
        @if($setting?->hero_background)
            <img src="{{ asset('storage/' . $setting->hero_background) }}"
                 alt="Hero"
                 class="w-full h-[420px] md:h-[520px] object-cover ">
        @else
            <div class="w-full h-[420px] md:h-[520px] bg-slate-400"></div>
        @endif

        <div class="absolute inset-0 bg-black/40" ></div>

        <div class="absolute inset-0 flex items-center">
            <div class="max-w-4xl mx-auto px-6 text-white">
                <h1 class="text-2xl md:text-4xl font-bold mb-4">
                    {{ $setting->hero_title ?? 'Selamat Datang di Koperasi Usaha Gilang Gemilang' }}
                </h1>
                <p class="text-base md:text-lg mb-4 max-w-2xl">
                    {{ $setting->hero_subtitle ?? 'Kami menyediakan layanan kredit pensiunan dengan bunga kompetitif dan proses yang cepat.' }}
                </p>
                @if($setting?->tagline)
                    <div class="inline-block bg-yellow-400 text-green-800 font-black px-4 py-2 rounded">
                        {{ $setting->tagline }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- ===== Kenapa Harus Gilang Gemilang ===== --}}
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

{{-- ===== Produk Kami (ringkas) ===== --}}
<section class="py-10 bg-slate-50">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h2 class="text-2xl font-bold mb-6">Produk Kami</h2>

        <div class="grid gap-6 md:grid-cols-3">
            @forelse($products as $product)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}"
                             alt="{{ $product->name }}"
                             class="w-full h-72 object-cover">
                    @endif
                    <div class="p-4 text-left">
                        <h3 class="font-semibold mb-2">{{ $product->name }}</h3>
                        <p class="text-sm text-slate-600 line-clamp-3">{{ $product->short_description }}</p>
                    </div>
                </div>
            @empty
                <p class="text-sm text-slate-500 col-span-3">Belum ada produk yang aktif.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- ===== Berita & Galeri singkat ===== --}}
<section class="py-10 bg-slate-50">
    <div class="max-w-6xl mx-auto px-4 space-y-8">
        {{-- ================= Berita Terkini (ATAS) ================= --}}
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="px-5 pt-5 pb-3 border-b">
                <h2 class="text-xl font-bold">Berita Kabupaten Tasikmalaya</h2>
            </div>

            @if($news->isEmpty())
                <div class="p-5 text-sm text-slate-500">
                    Belum ada berita.
                </div>
            @else
                <div class="p-5 min-h-[320px]">
                    {{-- flex row, 3 kartu per batch --}}
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

        {{-- ================= Foto Kegiatan (BAWAH) ================= --}}
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

    {{-- Script rotasi 5 detik --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function setupRotator(selector, batchSize, intervalMs) {
                const items = Array.from(document.querySelectorAll(selector));
                if (items.length <= batchSize) {
                    // kalau item <= batchSize, tidak perlu rotasi
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

            // Berita & Galeri: tampil 3 kartu, ganti tiap 5 detik
            setupRotator('.news-item', 3, 5000);
            setupRotator('.gallery-item', 3, 5000);
        });
    </script>
</section>

@endsection
