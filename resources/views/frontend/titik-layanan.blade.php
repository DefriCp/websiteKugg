@extends('frontend.layout')

@section('title', 'Titik Layanan - Koperasi Usaha Gilang Gemilang')

@section('content')
<section class="py-10 bg-slate-50">
    <div class="max-w-6xl mx-auto px-4">
        <h1 class="text-2xl md:text-3xl font-bold mb-2">
            Titik Layanan
        </h1>
        <p class="text-sm md:text-base text-slate-600 mb-6 max-w-2xl">
            Berikut lokasi titik layanan Koperasi Usaha Gilang Gemilang yang dapat Anda kunjungi.
        </p>

        {{-- Map besar --}}
        <div class="mb-8 rounded-2xl overflow-hidden shadow bg-slate-200">
            {{-- Embed Google Maps lokasi PT LCG / Kantor Pusat Operasional --}}
            <iframe
                src="https://www.google.com/maps?q=-6.3311092,106.799837&z=18&output=embed"
                class="w-full h-72 md:h-96 border-0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        {{-- List titik layanan --}}
        <div class="grid gap-5 md:grid-cols-2">
            {{-- Kartu 1: Kantor Pusat --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5 flex flex-col h-full">
                <div>
                    <h2 class="font-semibold text-lg mb-1">
                        Kantor Pusat
                    </h2>
                    <p class="text-sm text-slate-600 mb-2">
                        Jl. H Terin No.5. RT 005 / RW 03, Kelurahan Pangkalan jati baru, Kecamatan Cinere, Kota Depok, Jawa barat 16513
                    </p>
                    <p class="text-xs text-slate-500">
                        Telepon: 021-xxxxxxx
                    </p>
                </div>

                <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Sultan+Hasanudin,+Ruko+Tambun+City+R6-16,+Tambun+-+Bekasi"
                   target="_blank"
                   rel="noopener"
                   class="mt-4 inline-flex items-center text-[13px] text-emerald-700 hover:underline gap-1">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.8"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 21s-6-5.3-6-10a6 6 0 0 1 12 0c0 4.7-6 10-6 10z"/>
                        <circle cx="12" cy="11" r="2.5"/>
                    </svg>
                    <span>Lihat di Google Maps</span>
                </a>
            </div>
            
            {{-- Tambah kartu lain kalau ada titik layanan baru --}}
        </div>
    </div>
</section>
@endsection
