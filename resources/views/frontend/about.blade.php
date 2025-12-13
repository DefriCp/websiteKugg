@extends('frontend.layout')

@section('title', 'Tentang Kami')

@section('content')

{{-- =====================
 HERO SECTION
===================== --}}
<section class="relative bg-gradient-to-br from-primary/5 via-white to-primary/10 py-24 overflow-hidden">
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    <div class="max-w-6xl mx-auto px-4 relative z-10">
        <div class="text-center" data-aos="fade-down">
            <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-4">
                Tentang <span class="text-primary">Kami</span>
            </h1>
            <div class="w-24 h-1 bg-primary mx-auto rounded-full"></div>
        </div>
    </div>
</section>

{{-- =====================
 INFORMASI UMUM
===================== --}}
@if(isset($about['informasi_umum']))
<section class="py-20 max-w-6xl mx-auto px-4">
    <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12" data-aos="fade-up">
        <div class="prose prose-lg max-w-none">
            <p class="text-gray-700 leading-relaxed text-lg">
                {{ $about['informasi_umum']->first()->description }}
            </p>
        </div>
    </div>
</section>
@endif

{{-- =====================
 VISI & MISI
===================== --}}
@if(isset($about['visi']) || isset($about['misi']))
<section class="py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-8">

            @if(isset($about['visi']))
            <div class="group" data-aos="fade-right">
                <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 p-8 h-full border-t-4 border-primary">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center">
                            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">Visi</h2>
                    </div>
                    <p class="text-gray-700 leading-relaxed text-lg">
                        {{ $about['visi']->first()->description }}
                    </p>
                </div>
            </div>
            @endif

            @if(isset($about['misi']))
            <div class="group" data-aos="fade-left">
                <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 p-8 h-full border-t-4 border-primary">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center">
                            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">Misi</h2>
                    </div>
                    <p class="text-gray-700 leading-relaxed text-lg">
                        {{ $about['misi']->first()->description }}
                    </p>
                </div>
            </div>
            @endif

        </div>
    </div>
</section>
@endif

{{-- =====================
 KENAPA HARUS
===================== --}}
@if($whyReasons->count())
<section class="py-24 max-w-7xl mx-auto px-4">
    <div class="text-center mb-16" data-aos="fade-up">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
            Kenapa Harus <span class="text-primary">Gilang Gemilang</span>
        </h2>
        <p class="text-gray-600 max-w-2xl mx-auto">
            Alasan mengapa kami menjadi pilihan terbaik untuk kebutuhan Anda
        </p>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($whyReasons as $i => $item)
            <div
                class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-8 text-center border border-gray-100 hover:border-primary/30 hover:-translate-y-2"
                data-aos="fade-up"
                data-aos-delay="{{ $i * 100 }}"
            >
                <div class="w-45 h-45 mx-auto mb-6 bg-primary/10 rounded-2xl flex items-center justify-center group-hover:bg-primary/20 transition-colors duration-300 p-1">
                    <img
                        src="{{ asset('storage/'.$item->image) }}"
                        class="w-full h-full object-contain"
                        alt="{{ $item->title }}"
                    >
                </div>

                <h3 class="font-bold text-lg mb-3 text-gray-900 group-hover:text-primary transition-colors">
                    {{ $item->title }}
                </h3>

                <p class="text-gray-600 leading-relaxed text-sm">
                    {{ $item->description }}
                </p>
            </div>
        @endforeach
    </div>
</section>
@endif

{{-- =====================
 STRUKTUR MANAJEMEN
===================== --}}
@if($managements->count())
<section class="py-24 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Struktur <span class="text-primary">Manajemen</span>
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Tim profesional yang berdedikasi mengelola Koperasi Usaha Gilang Gemilang
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($managements as $i => $item)
                <div
                    class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 text-center hover:-translate-y-2"
                    data-aos="zoom-in"
                    data-aos-delay="{{ $i * 80 }}"
                >
                    <div class="relative inline-block mb-6">
                        <img
                            src="{{ asset('storage/'.$item->image) }}"
                            class="w-32 h-32 object-cover rounded-full border-4 border-primary/20 group-hover:border-primary transition-colors duration-300"
                            alt="{{ $item->title }}"
                        >
                        <div class="absolute -bottom-2 -right-2 w-10 h-10 bg-primary rounded-full flex items-center justify-center shadow-lg">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                            </svg>
                        </div>
                    </div>

                    <h3 class="font-bold text-xl text-gray-900 mb-2">
                        {{ $item->title }}
                    </h3>

                    <p class="text-primary font-semibold text-sm uppercase tracking-wide">
                        {{ $item->description }}
                    </p>
                </div>
            @endforeach
        </div>

    </div>
</section>
@endif

@endsection