@extends('frontend.layout')

@section('title', $product->name . ' - Produk')

@section('content')
<section class="py-10 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4">
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4 md:p-6">

            {{-- Judul --}}
            <h1 class="text-2xl md:text-3xl font-bold mb-3 md:mb-4 leading-snug">
                {{ $product->name }}
            </h1>

            {{-- Meta --}}
            <div class="flex flex-wrap items-center text-[11px] md:text-xs text-slate-500 gap-3 mb-4 md:mb-5">
                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full
                             {{ $product->is_active ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-600' }}">
                    {{ $product->is_active ? 'Produk Aktif' : 'Tidak Aktif' }}
                </span>

                @if($product->created_at)
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.8"
                             stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                        </svg>
                        <span>{{ $product->created_at->translatedFormat('l, d F Y') }}</span>
                    </div>
                @endif
            </div>

            <hr class="border-slate-100 mb-4 md:mb-5">

            {{-- Gambar Poster Portrait - OPSI 1: Center dengan max-width (Rekomendasi) --}}
            @if($product->image)
                <div class="mb-6 flex justify-center bg-slate-50 rounded-lg p-4">
                    <img src="{{ asset('storage/' . $product->image) }}"
                         alt="{{ $product->name }}"
                         class="w-auto h-auto max-w-full max-h-[700px] rounded-lg shadow-md">
                </div>
            @endif

            {{-- OPSI 2: Dengan lebar terbatas (Uncomment untuk pakai ini) --}}
            {{-- @if($product->image)
                <div class="mb-6 flex justify-center">
                    <div class="max-w-md w-full">
                        <img src="{{ asset('storage/' . $product->image) }}"
                             alt="{{ $product->name }}"
                             class="w-full h-auto rounded-lg shadow-md">
                    </div>
                </div>
            @endif --}}

            {{-- OPSI 3: Responsif dengan breakpoint (Uncomment untuk pakai ini) --}}
            {{-- @if($product->image)
                <div class="mb-6 flex justify-center">
                    <img src="{{ asset('storage/' . $product->image) }}"
                         alt="{{ $product->name }}"
                         class="w-full sm:w-2/3 md:w-1/2 h-auto rounded-lg shadow-md">
                </div>
            @endif --}}

            {{-- Deskripsi Singkat --}}
            @if($product->short_description)
                <p class="text-sm md:text-base text-slate-700 mb-4 md:mb-5">
                    {{ $product->short_description }}
                </p>
            @endif

            {{-- ==== DESKRIPSI LENGKAP ==== --}}
            @php
                $body = $product->description ?? '';
            @endphp

            @if($body)
                <article class="mt-2 text-sm md:text-base text-slate-800">
                    <div class="space-y-4 leading-relaxed md:leading-7 text-justify">
                        {!! $body !!}
                    </div>
                </article>
            @else
                <p class="text-sm text-slate-500 italic">
                    Belum ada deskripsi lengkap untuk produk ini.
                </p>
            @endif

            {{-- Tombol kembali --}}
            <div class="mt-8">
                <a href="{{ route('products') }}"
                   class="inline-flex items-center gap-1 text-sm text-emerald-700 hover:underline">
                    ← Kembali ke daftar produk
                </a>
            </div>

        </div>
    </div>
</section>
@endsection