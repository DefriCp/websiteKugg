@extends('frontend.layout')

@section('title', 'Pengajuan Kredit - Koperasi Usaha Gilang Gemilang')

@section('content')

{{-- Hero Section --}}
<section class="relative bg-gradient-to-br from-amber-50 via-white to-slate-50 py-20">
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    <div class="max-w-5xl mx-auto px-4 relative z-10">
        <div class="text-center" data-aos="fade-down">
            <div class="inline-block p-4 bg-amber-100 rounded-2xl mb-6">
                <svg class="w-12 h-12 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Pengajuan <span class="text-amber-500">Kredit</span>
            </h1>
            <div class="w-24 h-1 bg-amber-400 mx-auto rounded-full mb-6"></div>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Proses pengajuan kredit yang mudah dan cepat melalui WhatsApp
            </p>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4">
        
        {{-- Informasi Card --}}
        <div class="bg-gradient-to-br from-amber-50 to-slate-50 rounded-3xl p-8 md:p-12 mb-10 border border-amber-100" data-aos="fade-up">
            <div class="flex items-start gap-4 mb-6">
                <div class="flex-shrink-0 w-12 h-12 bg-amber-500 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Cara Pengajuan</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Untuk mengajukan kredit pensiunan, silakan hubungi admin kami melalui WhatsApp. 
                        Tim kami siap membantu Anda dengan proses yang cepat dan mudah.
                    </p>
                </div>
            </div>
        </div>

        {{-- Langkah-langkah --}}
        <div class="mb-12" data-aos="fade-up" data-aos-delay="100">
            <h3 class="text-2xl font-bold text-gray-900 mb-8 text-center">Langkah Mudah Pengajuan</h3>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-amber-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold text-amber-600">1</span>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Klik Tombol</h4>
                    <p class="text-sm text-gray-600">Klik tombol WhatsApp di bawah untuk terhubung dengan admin</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-amber-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold text-amber-600">2</span>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Konsultasi</h4>
                    <p class="text-sm text-gray-600">Sampaikan kebutuhan kredit Anda kepada admin kami</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-amber-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold text-amber-600">3</span>
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2">Proses Cepat</h4>
                    <p class="text-sm text-gray-600">Dapatkan persetujuan dan pencairan dana dengan cepat</p>
                </div>
            </div>
        </div>

        {{-- CTA Card --}}
        <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-3xl p-8 md:p-12 text-center relative overflow-hidden" data-aos="zoom-in">
            {{-- Decorative elements --}}
            <div class="absolute top-0 right-0 w-64 h-64 bg-amber-500/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-amber-500/10 rounded-full blur-3xl"></div>
            
            <div class="relative z-10">
                <div class="inline-block p-4 bg-white/10 backdrop-blur-sm rounded-2xl mb-6">
                    <svg class="w-12 h-12 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                </div>

                <h3 class="text-3xl font-bold text-white mb-4">
                    Siap Mengajukan Kredit?
                </h3>
                <p class="text-gray-300 mb-8 max-w-xl mx-auto">
                    Hubungi admin kami sekarang untuk konsultasi gratis dan proses pengajuan yang mudah
                </p>

                <a href="https://api.whatsapp.com/send?phone=6288225000199"
                   target="_blank"
                   class="group inline-flex items-center gap-3 px-8 py-4 rounded-xl bg-amber-400 hover:bg-amber-300 text-gray-900 font-bold transition-all shadow-lg hover:shadow-amber-400/50 hover:scale-105">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                    Hubungi Admin via WhatsApp
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>

                <div class="mt-8 flex items-center justify-center gap-2 text-gray-400 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                    <span>Data Anda aman dan terlindungi</span>
                </div>
            </div>
        </div>

        {{-- Info Tambahan --}}
        <div class="mt-12 grid md:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="200">
            <div class="text-center p-6 bg-slate-50 rounded-2xl">
                <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h4 class="font-bold text-gray-900 mb-2">Proses Cepat</h4>
                <p class="text-sm text-gray-600">Persetujuan dalam hitungan hari</p>
            </div>
            <div class="text-center p-6 bg-slate-50 rounded-2xl">
                <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h4 class="font-bold text-gray-900 mb-2">Aman Terpercaya</h4>
                <p class="text-sm text-gray-600">Data dijamin keamanannya</p>
            </div>
            <div class="text-center p-6 bg-slate-50 rounded-2xl">
                <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </div>
                <h4 class="font-bold text-gray-900 mb-2">Layanan Prima</h4>
                <p class="text-sm text-gray-600">Admin siap membantu Anda</p>
            </div>
        </div>

    </div>
</section>
@endsection