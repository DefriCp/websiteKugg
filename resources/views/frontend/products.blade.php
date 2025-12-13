@extends('frontend.layout')

@section('title', 'Produk - Koperasi Usaha Gilang Gemilang')

@section('content')

{{-- Hero Section --}}
<section class="relative bg-gradient-to-br from-amber-50 via-white to-slate-50 py-20">
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    <div class="max-w-6xl mx-auto px-4 relative z-10">
        <div class="text-center" data-aos="fade-down">
            <div class="inline-block p-4 bg-amber-100 rounded-2xl mb-6">
                <svg class="w-12 h-12 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Produk <span class="text-amber-500">Kami</span>
            </h1>
            <div class="w-24 h-1 bg-amber-400 mx-auto rounded-full mb-6"></div>
            <p class="text-gray-600 text-lg max-w-3xl mx-auto">
                Berbagai produk kredit yang dirancang khusus untuk memenuhi kebutuhan finansial para pensiunan
            </p>
        </div>
    </div>
</section>

{{-- Products Grid --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        
        @if($products->isEmpty())
            <div class="text-center py-20" data-aos="fade-up">
                <div class="inline-block p-6 bg-slate-100 rounded-3xl mb-6">
                    <svg class="w-16 h-16 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Belum Ada Produk</h3>
                <p class="text-gray-600 mb-6">Produk sedang dalam persiapan. Silakan cek kembali nanti.</p>
                <a href="{{ route('home') }}" 
                   class="inline-flex items-center gap-2 px-6 py-3 bg-amber-400 hover:bg-amber-300 text-gray-900 font-semibold rounded-xl transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>
        @else
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($products as $i => $product)
                    <a href="{{ route('product.show', $product) }}"
                       class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden flex flex-col hover:-translate-y-2"
                       data-aos="fade-up"
                       data-aos-delay="{{ $i * 100 }}">

                        @if($product->image)
                            <div class="relative aspect-[4/3] overflow-hidden bg-gradient-to-br from-amber-50 to-slate-50">
                                <img src="{{ asset('storage/'.$product->image) }}"
                                     alt="{{ $product->name }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                
                                {{-- Overlay Badge --}}
                                <div class="absolute top-4 right-4 bg-amber-400 text-gray-900 px-4 py-2 rounded-full text-xs font-bold shadow-lg">
                                    Kredit Pensiun
                                </div>
                            </div>
                        @endif

                        <div class="p-6 flex-1 flex flex-col">
                            <h2 class="font-bold text-xl mb-3 text-gray-900 group-hover:text-amber-600 transition-colors">
                                {{ $product->name }}
                            </h2>
                            
                            <p class="text-gray-600 leading-relaxed flex-1 line-clamp-3 mb-4">
                                {{ $product->short_description }}
                            </p>

                            {{-- CTA --}}
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <span class="inline-flex items-center gap-2 text-amber-600 font-bold group-hover:gap-3 transition-all">
                                    Lihat Detail
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </span>
                                
                                <div class="flex items-center gap-1 text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            {{-- CTA Section --}}
            <div class="mt-16 bg-gradient-to-br from-gray-900 to-gray-800 rounded-3xl p-8 md:p-12 text-center relative overflow-hidden" data-aos="zoom-in">
                {{-- Decorative elements --}}
                <div class="absolute top-0 right-0 w-64 h-64 bg-amber-500/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-amber-500/10 rounded-full blur-3xl"></div>
                
                <div class="relative z-10">
                    <h3 class="text-3xl font-bold text-white mb-4">
                        Tertarik dengan Produk Kami?
                    </h3>
                    <p class="text-gray-300 mb-8 max-w-2xl mx-auto">
                        Hubungi kami sekarang untuk konsultasi gratis dan dapatkan solusi kredit yang tepat untuk Anda
                    </p>

                    <div class="flex flex-wrap items-center justify-center gap-4">
                        <a href="{{ route('pengajuan') }}"
                           class="group inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-amber-400 hover:bg-amber-300 text-gray-900 font-bold transition-all shadow-lg hover:shadow-amber-400/50 hover:scale-105">
                            Ajukan Sekarang
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>

                        <a href="{{ route('pengajuan') }}"
                           class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl border-2 border-white/60 text-white hover:bg-white/10 hover:border-white transition-all backdrop-blur-sm">
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        @endif

    </div>
</section>

{{-- Features Section --}}
<section class="py-20 bg-gradient-to-b from-slate-50 to-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                Keunggulan <span class="text-amber-500">Produk Kami</span>
            </h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center p-6" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-amber-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-lg text-gray-900 mb-2">Bunga Kompetitif</h3>
                <p class="text-sm text-gray-600">Suku bunga yang bersaing dan terjangkau</p>
            </div>

            <div class="text-center p-6" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-amber-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-lg text-gray-900 mb-2">Proses Cepat</h3>
                <p class="text-sm text-gray-600">Persetujuan dan pencairan dana yang cepat</p>
            </div>

            <div class="text-center p-6" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-amber-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-lg text-gray-900 mb-2">Aman & Terpercaya</h3>
                <p class="text-sm text-gray-600">Koperasi terdaftar dan terpercaya</p>
            </div>
        </div>
    </div>
</section>

@endsection