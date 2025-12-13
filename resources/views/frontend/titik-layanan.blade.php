@extends('frontend.layout')

@section('title', 'Titik Layanan - Koperasi Usaha Gilang Gemilang')

@section('content')

<<<<<<< HEAD
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
=======
{{-- Hero Section --}}
<section class="relative bg-gradient-to-br from-amber-50 via-white to-slate-50 py-20">
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    <div class="max-w-6xl mx-auto px-4 relative z-10">
        <div class="text-center" data-aos="fade-down">
            <div class="inline-block p-4 bg-amber-100 rounded-2xl mb-6">
                <svg class="w-12 h-12 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
>>>>>>> a371920 (update 90%)
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Titik <span class="text-amber-500">Layanan</span>
            </h1>
            <div class="w-24 h-1 bg-amber-400 mx-auto rounded-full mb-6"></div>
            <p class="text-gray-600 text-lg max-w-3xl mx-auto">
                Temukan lokasi kantor kami dan kunjungi untuk mendapatkan layanan terbaik
            </p>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        
        {{-- Map Section --}}
        <div class="mb-16" data-aos="fade-up">
            <div class="bg-gradient-to-br from-slate-50 to-white rounded-3xl p-6 md:p-8 shadow-xl border border-slate-100">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-amber-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Lokasi Kantor Kami</h2>
                </div>
                
                <div class="rounded-2xl overflow-hidden shadow-lg border-4 border-white">
                    <iframe
                        src="https://www.google.com/maps?q=-6.3311092,106.799837&z=18&output=embed"
                        class="w-full h-96 md:h-[500px] border-0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

        {{-- Service Points Cards --}}
        <div data-aos="fade-up" data-aos-delay="100">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    Kantor <span class="text-amber-500">Kami</span>
                </h2>
                <p class="text-gray-600">Kunjungi kantor kami untuk layanan langsung dan konsultasi</p>
            </div>

            <div class="grid gap-8 md:grid-cols-2">
                
                {{-- Kantor Pusat --}}
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 border-2 border-slate-100 hover:border-amber-200 overflow-hidden hover:-translate-y-1"
                     data-aos="zoom-in">
                    
                    {{-- Header dengan gradient --}}
                    <div class="bg-gradient-to-br from-amber-500 to-amber-600 p-6 text-white">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <div>
                                <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-xs font-semibold mb-2">
                                    Kantor Utama
                                </span>
                                <h3 class="text-2xl font-bold">Kantor Pusat</h3>
                            </div>
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="p-6 space-y-4">
                        
                        {{-- Alamat --}}
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-amber-50 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">Alamat</p>
                                <p class="text-gray-700 leading-relaxed">
                                    Jl. H Terin No.5. RT 005 / RW 03, Kelurahan Pangkalan Jati Baru, Kecamatan Cinere, Kota Depok, Jawa Barat 16513
                                </p>
                            </div>
                        </div>

                        {{-- Telepon --}}
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-amber-50 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">Telepon</p>
                                <a href="tel:021xxxxxxx" class="text-gray-700 hover:text-amber-600 transition-colors font-medium">
                                    021-xxxxxxx
                                </a>
                            </div>
                        </div>

                        {{-- Jam Operasional --}}
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-amber-50 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">Jam Operasional</p>
                                <p class="text-gray-700">Senin - Jumat: 08.00 - 17.00 WIB</p>
                                <p class="text-gray-700">Sabtu: 08.00 - 12.00 WIB</p>
                            </div>
                        </div>

                        {{-- Divider --}}
                        <div class="border-t border-gray-100 my-4"></div>

                        {{-- Action Buttons --}}
                        <div class="flex flex-wrap gap-3">
                            <a href="https://www.google.com/maps/search/?api=1&query=-6.3311092,106.799837"
                               target="_blank"
                               rel="noopener"
                               class="flex-1 group/btn inline-flex items-center justify-center gap-2 px-4 py-3 bg-amber-400 hover:bg-amber-500 text-gray-900 font-semibold rounded-xl transition-all hover:scale-105 shadow-md hover:shadow-lg">
                                <svg class="w-5 h-5 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>Buka di Maps</span>
                            </a>

                            <a href="https://www.google.com/maps/dir/?api=1&destination=-6.3311092,106.799837"
                               target="_blank"
                               rel="noopener"
                               class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-white border-2 border-amber-400 text-amber-600 font-semibold rounded-xl hover:bg-amber-50 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Petunjuk Arah</span>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Tambahan: Info Card --}}
                <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl p-8 text-white relative overflow-hidden"
                     data-aos="zoom-in"
                     data-aos-delay="100">
                    
                    {{-- Decorative --}}
                    <div class="absolute top-0 right-0 w-40 h-40 bg-amber-500/10 rounded-full blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 w-40 h-40 bg-amber-500/10 rounded-full blur-3xl"></div>
                    
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-amber-400/20 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>

                        <h3 class="text-2xl font-bold mb-4">Butuh Bantuan?</h3>
                        <p class="text-gray-300 mb-6 leading-relaxed">
                            Tim kami siap membantu Anda. Hubungi kami melalui WhatsApp atau kunjungi kantor kami langsung untuk konsultasi gratis.
                        </p>

                        <div class="space-y-3">
                            <a href="https://api.whatsapp.com/send?phone=6288225000199"
                               target="_blank"
                               class="group/wa flex items-center gap-3 p-4 bg-white/10 backdrop-blur-sm hover:bg-white/20 rounded-xl transition-all">
                                <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-400 mb-0.5">WhatsApp</p>
                                    <p class="font-semibold group-hover/wa:text-amber-400 transition-colors">+62 882-2500-0199</p>
                                </div>
                                <svg class="w-5 h-5 text-gray-400 group-hover/wa:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>

                            <a href="tel:021xxxxxxx"
                               class="group/tel flex items-center gap-3 p-4 bg-white/10 backdrop-blur-sm hover:bg-white/20 rounded-xl transition-all">
                                <div class="w-12 h-12 bg-amber-400 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-400 mb-0.5">Telepon</p>
                                    <p class="font-semibold group-hover/tel:text-amber-400 transition-colors">021-xxxxxxx</p>
                                </div>
                                <svg class="w-5 h-5 text-gray-400 group-hover/tel:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection