@extends('frontend.layout')

@section('title', 'Mitra Kerjasama - Koperasi Usaha Gilang Gemilang')

@section('content')

{{-- Hero Section --}}
<section class="relative bg-gradient-to-br from-amber-50 via-white to-slate-50 py-20">
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    <div class="max-w-6xl mx-auto px-4 relative z-10">
        <div class="text-center" data-aos="fade-down">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Mitra <span class="text-amber-500">Kerjasama</span>
            </h1>
            <div class="w-24 h-1 bg-amber-400 mx-auto rounded-full mb-6"></div>
            <p class="text-gray-600 text-lg max-w-3xl mx-auto">
                Koperasi Usaha Gilang Gemilang bekerja sama dengan berbagai mitra pendana dan mitra juru bayar
                untuk memberikan layanan kredit pensiun yang aman dan terpercaya.
            </p>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4 space-y-16">
        
        {{-- Mitra Pendana --}}
        <div data-aos="fade-up">
            <div class="mb-10">
                <h2 class="text-3xl font-bold text-gray-900 mb-3">
                    <span class="inline-flex items-center gap-3">
                        <svg class="w-8 h-8 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Mitra Pendana
                    </span>
                </h2>
                <p class="text-gray-600">Lembaga keuangan yang mendukung program kredit kami</p>
            </div>

            @if($mitraPendana->isEmpty())
                <div class="text-center py-12 bg-slate-50 rounded-2xl">
                    <p class="text-gray-500">Belum ada data mitra pendana.</p>
                </div>
            @else
                <div class="grid gap-6 md:grid-cols-2">
                    @foreach($mitraPendana as $i => $mitra)
                        <article class="group bg-white border-2 border-slate-100 hover:border-amber-200 rounded-2xl p-6 flex gap-5 transition-all hover:shadow-xl hover:-translate-y-1"
                                 data-aos="fade-up"
                                 data-aos-delay="{{ $i * 100 }}">
                            @if($mitra->logo_path)
                                <div class="flex-shrink-0">
                                    <div class="w-20 h-20 rounded-xl bg-gradient-to-br from-amber-50 to-slate-50 p-2 flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <img src="{{ asset('storage/'.$mitra->logo_path) }}"
                                             alt="{{ $mitra->name }}"
                                             class="w-full h-full object-contain">
                                    </div>
                                </div>
                            @endif

                            <div class="flex-1">
                                <h3 class="font-bold text-xl mb-2 text-gray-900 group-hover:text-amber-600 transition-colors">
                                    {{ $mitra->name }}
                                </h3>

                                @if($mitra->description)
                                    <p class="text-gray-600 mb-3 leading-relaxed">
                                        {{ $mitra->description }}
                                    </p>
                                @endif

                                @if($mitra->website)
                                    <a href="{{ $mitra->website }}"
                                       target="_blank"
                                       class="inline-flex items-center gap-2 text-sm font-semibold text-amber-600 hover:text-amber-700 hover:gap-3 transition-all">
                                        Kunjungi Website
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Mitra Juru Bayar --}}
        <div data-aos="fade-up">
            <div class="mb-10">
                <h2 class="text-3xl font-bold text-gray-900 mb-3">
                    <span class="inline-flex items-center gap-3">
                        <svg class="w-8 h-8 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                        </svg>
                        Mitra Juru Bayar
                    </span>
                </h2>
                <p class="text-gray-600">Partner pembayaran yang memudahkan transaksi Anda</p>
            </div>

            @if($mitraJuruBayar->isEmpty())
                <div class="text-center py-12 bg-slate-50 rounded-2xl">
                    <p class="text-gray-500">Belum ada data mitra juru bayar.</p>
                </div>
            @else
                <div class="grid gap-6 md:grid-cols-2">
                    @foreach($mitraJuruBayar as $i => $mitra)
                        <article class="group bg-white border-2 border-slate-100 hover:border-amber-200 rounded-2xl p-6 flex gap-5 transition-all hover:shadow-xl hover:-translate-y-1"
                                 data-aos="fade-up"
                                 data-aos-delay="{{ $i * 100 }}">
                            @if($mitra->logo_path)
                                <div class="flex-shrink-0">
                                    <div class="w-20 h-20 rounded-xl bg-gradient-to-br from-amber-50 to-slate-50 p-2 flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <img src="{{ asset('storage/'.$mitra->logo_path) }}"
                                             alt="{{ $mitra->name }}"
                                             class="w-full h-full object-contain">
                                    </div>
                                </div>
                            @endif

                            <div class="flex-1">
                                <h3 class="font-bold text-xl mb-2 text-gray-900 group-hover:text-amber-600 transition-colors">
                                    {{ $mitra->name }}
                                </h3>

                                @if($mitra->description)
                                    <p class="text-gray-600 mb-3 leading-relaxed">
                                        {{ $mitra->description }}
                                    </p>
                                @endif

                                @if($mitra->website)
                                    <a href="{{ $mitra->website }}"
                                       target="_blank"
                                       class="inline-flex items-center gap-2 text-sm font-semibold text-amber-600 hover:text-amber-700 hover:gap-3 transition-all">
                                        Kunjungi Website
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>

    </div>
</section>
@endsection