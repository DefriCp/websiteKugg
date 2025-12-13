<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">

    <title>
        @yield('title', $globalSetting->site_name ?? 'Koperasi Usaha Gilang Gemilang')
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#F9B733',
                        secondary: '#20B820',
                    }
                }
            }
        }
    </script>

<<<<<<< HEAD
    {{-- Alpine untuk interaksi (navbar mobile & pengaduan) --}}
=======
    {{-- Alpine untuk interaksi --}}
>>>>>>> a371920 (update 90%)
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        [x-cloak] { display: none !important; }

<<<<<<< HEAD
        /* pastikan tidak ada CSS global yang merusak ukuran svg */
        svg {
            display: inline-block;
            vertical-align: middle;
            /* jangan paksa ukuran di sini — gunakan atribut/class pada SVG */
=======
        svg {
            display: inline-block;
            vertical-align: middle;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }

        .bg-grid-pattern {
            background-image: 
                linear-gradient(to right, rgba(0,0,0,0.05) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(0,0,0,0.05) 1px, transparent 1px);
            background-size: 20px 20px;
>>>>>>> a371920 (update 90%)
        }
    </style>
    
    @if(isset($seoJsonLd))
    <script type="application/ld+json">
    {!! $seoJsonLd !!}
    </script>
    @endif
</head>
<<<<<<< HEAD
<body class="bg-white text-slate-900"
      x-data="{ openPengaduan: false, openMobileNav: false }">

    {{-- ========== NAVBAR ========== --}}
    @php
        $navBase = 'text-sm font-semibold transition-colors duration-150';
    @endphp

    <header class="relative z-30">
        {{-- bar utama --}}
        <div class="bg-gradient-to-r from-[#FFFFFF] via-[#FFE7B5] to-[#F9B733] shadow-[0_4px_20px_rgba(0,0,0,0.08)]">
            <div class="max-w-6xl mx-auto px-4 py-3 md:py-4 flex items-center justify-between text-black">

                {{-- Logo + teks --}}
                <div class="flex items-center gap-3">
                    <img
                        src="{{ $globalSetting?->logo
                                ? asset('storage/'.$globalSetting->logo)
                                : asset('images/logo-gemilang.png') }}"
                        alt="Logo"
                        class="h-10 md:h-12"
                    >
                    <div class="leading-tight">
                        <div class="font-semibold text-base md:text-lg text-slate-900">
                            {{ $globalSetting->site_name ?? 'Gilang Gemilang' }}
                        </div>
                        <div class="text-[10px] md:text-[11px] text-slate-600">
                            Koperasi Serba Usaha
                        </div>
                    </div>
                </div>

                {{-- MENU DESKTOP --}}
                <nav class="hidden md:flex flex-1 justify-center items-center gap-10">
                    <a href="{{ route('home') }}"
                       class="{{ request()->routeIs('home')
                                    ? 'text-amber-700 font-extrabold'
                                    : 'text-slate-900 hover:text-amber-600' }} {{ $navBase }}">
                        Beranda
                    </a>

                    <a href="{{ route('about') }}"
                       class="{{ request()->routeIs('about')
                                    ? 'text-amber-700 font-extrabold'
                                    : 'text-slate-900 hover:text-amber-600' }} {{ $navBase }}">
                        Tentang kami
                    </a>

                    <a href="{{ route('products') }}"
                       class="{{ request()->routeIs('products')
                                    ? 'text-amber-700 font-extrabold'
                                    : 'text-slate-900 hover:text-amber-600' }} {{ $navBase }}">
                        Produk
                    </a>

                    <a href="{{ route('titik-layanan') }}"
                       class="{{ request()->routeIs('titik-layanan')
                                    ? 'text-amber-700 font-extrabold'
                                    : 'text-slate-900 hover:text-amber-600' }} {{ $navBase }}">
                        Titik Layanan
                    </a>

                    <a href="{{ route('mitra') }}"
                       class="{{ request()->routeIs('mitra')
                                    ? 'text-amber-700 font-extrabold'
                                    : 'text-slate-900 hover:text-amber-600' }} {{ $navBase }}">
                        Mitra
                    </a>
                </nav>

                {{-- Tombol Pengajuan Kredit (Desktop) --}}
                <div class="hidden md:flex">
                    <a href="{{ route('pengajuan') }}"
                       class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg
                              bg-[#20B820] hover:bg-[#18A318] text-white text-sm font-semibold
                              shadow-[0_4px_12px_rgba(0,0,0,0.25)] transition">
                        Pengajuan Kredit
                    </a>
                </div>

                {{-- TOGGLER MOBILE --}}
                <button
                    type="button"
                    class="md:hidden inline-flex items-center justify-center p-2 rounded-md
                           border border-amber-500/70 text-amber-700 focus:outline-none
                           focus:ring-2 focus:ring-offset-2 focus:ring-amber-400 bg-white/60"
                    @click="openMobileNav = !openMobileNav"
                    aria-label="Toggle navigation"
                >
                    <svg x-show="!openMobileNav" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="openMobileNav" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- bayangan putih di bawah navbar (lebih kerasa di desktop) --}}
        <div class="pointer-events-none hidden md:block absolute inset-x-0 bottom-[-10px]">
            <div class="mx-auto w-[92%] h-4 bg-white rounded-b-3xl shadow-[0_10px_25px_rgba(0,0,0,0.12)]"></div>
        </div>

        {{-- MENU MOBILE --}}
        <div
            class="md:hidden"
            x-cloak
            x-show="openMobileNav"
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
        >
            <div class="bg-white border-t border-amber-100 shadow-lg">
                <div class="max-w-6xl mx-auto px-4 py-3 space-y-1 text-sm">
                    <a href="{{ route('home') }}"
                       class="block py-2 {{ request()->routeIs('home')
                                ? 'text-amber-700 font-semibold'
                                : 'text-slate-900 hover:text-amber-600' }}">
                        Beranda
                    </a>

                    <a href="{{ route('about') }}"
                       class="block py-2 {{ request()->routeIs('about')
                                ? 'text-amber-700 font-semibold'
                                : 'text-slate-900 hover:text-amber-600' }}">
                        Tentang kami
                    </a>

                    <a href="{{ route('products') }}"
                       class="block py-2 {{ request()->routeIs('products')
                                ? 'text-amber-700 font-semibold'
                                : 'text-slate-900 hover:text-amber-600' }}">
                        Produk
                    </a>

                    <a href="{{ route('titik-layanan') }}"
                       class="block py-2 {{ request()->routeIs('titik-layanan')
                                ? 'text-amber-700 font-semibold'
                                : 'text-slate-900 hover:text-amber-600' }}">
                        Titik Layanan
                    </a>

                    <a href="{{ route('mitra') }}"
                       class="block py-2 {{ request()->routeIs('mitra')
                                ? 'text-amber-700 font-semibold'
                                : 'text-slate-900 hover:text-amber-600' }}">
                        Mitra
                    </a>

                    <div class="pt-2">
                        <a href="{{ route('pengajuan') }}"
                           class="block w-full text-center px-4 py-2.5 rounded-lg
                                  bg-[#20B820] hover:bg-[#18A318] text-white text-sm font-semibold
                                  shadow-md">
                            Pengajuan Kredit
                        </a>
                    </div>
=======
<body class="bg-white text-slate-900 antialiased"
      x-data="{ openPengaduan: false, openMobileNav: false }">

    {{-- ========== NAVBAR ========== --}}
    <header class="fixed top-0 left-0 right-0 z-50 bg-gradient-to-r from-[#FFFFFF] via-[#FFE7B5] to-[#F9B733] shadow-[0_4px_20px_rgba(0,0,0,0.08)]">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">

            {{-- Logo + Brand --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <img
                    src="{{ $globalSetting?->logo
                            ? asset('storage/'.$globalSetting->logo)
                            : asset('images/logo-gemilang.png') }}"
                    alt="Logo"
                    class="h-10 md:h-12 transition-transform group-hover:scale-105"
                >
                <div class="leading-tight">
                    <div class="font-semibold text-base md:text-lg text-slate-900">
                        {{ $globalSetting->site_name ?? 'Gilang Gemilang' }}
                    </div>
                    <div class="text-[10px] md:text-[11px] text-slate-600">
                        Koperasi Serba Usaha
                    </div>
                </div>
            </a>

            {{-- MENU DESKTOP --}}
            <nav class="hidden lg:flex items-center gap-8">
                <a href="{{ route('home') }}"
                   class="text-sm font-semibold transition-colors
                          {{ request()->routeIs('home') ? 'text-amber-700 font-extrabold' : 'text-slate-900 hover:text-amber-600' }}">
                    Beranda
                </a>

                <a href="{{ route('about') }}"
                   class="text-sm font-semibold transition-colors
                          {{ request()->routeIs('about') ? 'text-amber-700 font-extrabold' : 'text-slate-900 hover:text-amber-600' }}">
                    Tentang Kami
                </a>

                <a href="{{ route('products') }}"
                   class="text-sm font-semibold transition-colors
                          {{ request()->routeIs('products') ? 'text-amber-700 font-extrabold' : 'text-slate-900 hover:text-amber-600' }}">
                    Produk
                </a>

                <a href="{{ route('titik-layanan') }}"
                   class="text-sm font-semibold transition-colors
                          {{ request()->routeIs('titik-layanan') ? 'text-amber-700 font-extrabold' : 'text-slate-900 hover:text-amber-600' }}">
                    Titik Layanan
                </a>

                <a href="{{ route('mitra') }}"
                   class="text-sm font-semibold transition-colors
                          {{ request()->routeIs('mitra') ? 'text-amber-700 font-extrabold' : 'text-slate-900 hover:text-amber-600' }}">
                    Mitra
                </a>
            </nav>

            {{-- CTA Button (Desktop) --}}
            <div class="hidden lg:flex">
                <a href="{{ route('pengajuan') }}"
                   class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg
                          bg-[#20B820] hover:bg-[#18A318] text-white text-sm font-semibold
                          shadow-[0_4px_12px_rgba(0,0,0,0.25)] transition">
                    Pengajuan Kredit
                </a>
            </div>

            {{-- Mobile Menu Button --}}
            <button
                type="button"
                class="lg:hidden inline-flex items-center justify-center p-2 rounded-md
                       border border-amber-500/70 text-amber-700 focus:outline-none
                       focus:ring-2 focus:ring-offset-2 focus:ring-amber-400 bg-white/60"
                @click="openMobileNav = !openMobileNav"
                aria-label="Toggle navigation"
            >
                <svg x-show="!openMobileNav" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="openMobileNav" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- MOBILE MENU --}}
        <div
            class="lg:hidden bg-white border-t border-amber-100"
            x-cloak
            x-show="openMobileNav"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
        >
            <div class="max-w-7xl mx-auto px-4 py-3 space-y-1 text-sm">
                <a href="{{ route('home') }}"
                   class="block py-2 {{ request()->routeIs('home')
                                ? 'text-amber-700 font-semibold'
                                : 'text-slate-900 hover:text-amber-600' }}">
                    Beranda
                </a>

                <a href="{{ route('about') }}"
                   class="block py-2 {{ request()->routeIs('about')
                                ? 'text-amber-700 font-semibold'
                                : 'text-slate-900 hover:text-amber-600' }}">
                    Tentang Kami
                </a>

                <a href="{{ route('products') }}"
                   class="block py-2 {{ request()->routeIs('products')
                                ? 'text-amber-700 font-semibold'
                                : 'text-slate-900 hover:text-amber-600' }}">
                    Produk
                </a>

                <a href="{{ route('titik-layanan') }}"
                   class="block py-2 {{ request()->routeIs('titik-layanan')
                                ? 'text-amber-700 font-semibold'
                                : 'text-slate-900 hover:text-amber-600' }}">
                    Titik Layanan
                </a>

                <a href="{{ route('mitra') }}"
                   class="block py-2 {{ request()->routeIs('mitra')
                                ? 'text-amber-700 font-semibold'
                                : 'text-slate-900 hover:text-amber-600' }}">
                    Mitra
                </a>

                <div class="pt-2">
                    <a href="{{ route('pengajuan') }}"
                       class="block w-full text-center px-4 py-2.5 rounded-lg
                              bg-[#20B820] hover:bg-[#18A318] text-white text-sm font-semibold
                              shadow-md">
                        Pengajuan Kredit
                    </a>
>>>>>>> a371920 (update 90%)
                </div>
            </div>
        </div>
    </header>

<<<<<<< HEAD
    {{-- ========== KONTEN HALAMAN ========== --}}
    <main class="mt-4 md:mt-8">
=======
    {{-- ========== KONTEN (dengan padding top untuk navbar fixed) ========== --}}
    <main class="pt-20">
>>>>>>> a371920 (update 90%)
        @yield('content')
    </main>

    {{-- ========== FLOATING PENGADUAN BUTTON ========== --}}
    <button
        type="button"
        @click="openPengaduan = true"
        class="fixed bottom-5 right-4 md:bottom-10 md:right-10 z-40 float-animation
               shadow-2xl rounded-full border-2 border-white/80
               bg-amber-400 hover:bg-amber-500 text-slate-900
               px-4 md:px-7 py-2.5 md:py-4 flex items-center gap-2 md:gap-3
               backdrop-blur-md transition transform hover:-translate-y-1 text-xs md:text-sm"
    >
        <span class="flex items-center justify-center w-8 h-8 md:w-11 md:h-11 rounded-full bg-white text-amber-600 shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 md:w-6 md:h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5A8.49 8.49 0 0 1 21 11v.5z"/>
            </svg>
        </span>

        <span class="font-bold tracking-wide">
            Pengaduan
        </span>
    </button>

    {{-- ========== PANEL PENGADUAN ========== --}}
    <div
        x-cloak
        x-show="openPengaduan"
        class="fixed inset-0 z-50 flex items-center justify-center p-4"
        aria-modal="true"
        role="dialog"
    >
        {{-- Backdrop --}}
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" @click="openPengaduan = false"></div>

        {{-- Modal --}}
        <div
            class="relative w-full max-w-lg bg-white rounded-3xl shadow-2xl overflow-hidden"
            x-transition:enter="transform transition ease-out duration-200"
            x-transition:enter-start="scale-95 opacity-0"
            x-transition:enter-end="scale-100 opacity-100"
            x-transition:leave="transform transition ease-in duration-150"
            x-transition:leave-start="scale-100 opacity-100"
            x-transition:leave-end="scale-95 opacity-0"
        >
            {{-- Header --}}
            <div class="bg-gradient-to-r from-amber-400 via-amber-300 to-yellow-300 px-6 py-5 flex items-center justify-between">
                <div>
                    <p class="text-xs uppercase font-bold text-amber-900/70 tracking-wider mb-1">
                        Form Pengaduan
                    </p>
                    <h2 class="text-xl font-bold text-black-900">
                        Pengaduan, Kritik & Saran
                    </h2>
                </div>
                <button
                    type="button"
                    @click="openPengaduan = false"
                    class="w-10 h-10 rounded-full bg-white/80 hover:bg-white shadow-md flex items-center justify-center transition-all hover:scale-110"
                >
                    <svg class="w-5 h-5 text-black-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Alert Info --}}
            <div class="px-6 py-4 bg-amber-50 border-b border-amber-100">
                <div class="flex gap-3">
                    <svg class="w-5 h-5 text-amber-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-xs text-black-700 leading-relaxed">
                        Laporkan disini apabila karyawan kami meminta imbalan dalam bentuk apapun kepada NASABAH!
                    </p>
                </div>
            </div>

            {{-- Form --}}
            <div class="p-6 max-h-[60vh] overflow-y-auto">
                @if(session('status'))
                    <div class="mb-4 p-4 rounded-xl bg-green-50 border border-green-200 text-green-700 text-sm">
                        {{ session('status') }}
                    </div>
<<<<<<< HEAD
                    <button
                        type="button"
                        @click="openPengaduan = false"
                        class="p-1.5 rounded-full bg-white/70 hover:bg-white shadow-sm"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
=======
                @endif
>>>>>>> a371920 (update 90%)

                <form method="POST" action="{{ route('contact.store') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block font-semibold text-black-900 mb-2 text-sm">
                            Nama Anda
                        </label>
                        <input type="text" name="name"
                               class="w-full border-2 border-black-200 rounded-xl px-4 py-3 focus:outline-none focus:border-amber-400 transition-colors"
                               required>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-semibold text-black-900 mb-2 text-sm">
                                Nomor Handphone
                            </label>
                            <input type="text" name="phone"
                                   class="w-full border-2 border-black-200 rounded-xl px-4 py-3 focus:outline-none focus:border-amber-400 transition-colors"
                                   required>
                        </div>

                        <div>
                            <label class="block font-semibold text-black-900 mb-2 text-sm">
                                Alamat Email
                            </label>
                            <input type="email" name="email"
                                   class="w-full border-2 border-black-200 rounded-xl px-4 py-3 focus:outline-none focus:border-amber-400 transition-colors">
                        </div>
                    </div>

                    <div>
                        <label class="block font-semibold text-black-900 mb-2 text-sm">
                            Isi Keterangan
                        </label>
                        <textarea name="message" rows="4"
                                  class="w-full border-2 border-black-200 rounded-xl px-4 py-3 resize-none focus:outline-none focus:border-amber-400 transition-colors"
                                  required></textarea>
                    </div>

                    <button type="submit"
                            class="w-full py-3.5 rounded-xl bg-amber-400 hover:bg-amber-500 text-black-900 font-bold shadow-lg hover:shadow-amber-500/50 transition-all hover:scale-105">
                        Kirim Pengaduan
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- ========== FOOTER ========== --}}
    @php
        $addr     = $globalSetting->address   ?? 'Jl. .......................';
        $phone    = $globalSetting->phone     ?? '021-123456';
        $whatsapp = $globalSetting->whatsapp  ?? null;
        $email    = $globalSetting->email     ?? 'pensiun.gemilang@gilanggemilang.id';
        $igUrl    = $globalSetting->instagram_url ?? 'https://instagram.com/gemilangkoperasi';
        $fbUrl    = $globalSetting->facebook_url  ?? '#';

        $todayVisitors = $todayVisitors ?? 0;
        $totalVisitors = $totalVisitors ?? 0;
    @endphp

<<<<<<< HEAD
    <footer class="mt-12 text-black text-sm">
        <div class="bg-gradient-to-r from-[#FFFFFF] via-[#FFE7B5] to-[#F9B733] shadow-[0_4px_20px_rgba(0,0,0,0.08)]">
            <div class="max-w-6xl mx-auto px-4 py-10 md:py-12">
                <div class="grid gap-8 md:gap-10 md:grid-cols-4">

                    {{-- Logo & Tagline --}}
                    <div class="space-y-3">
                        <div class="flex items-center gap-2">
                            <img
                                src="{{ $globalSetting?->logo
                                        ? asset('storage/'.$globalSetting->logo)
                                        : asset('images/logo-gemilang.png') }}"
                                alt="Logo"
                                class="h-10 md:h-12"
                            >
                        </div>
                        <div>
                            <h3 class="font-bold text-base">
                                {{ $globalSetting->site_name ?? 'Koperasi Usaha Gilang Gemilang' }}
                            </h3>
                            <p class="text-xs opacity-90">
                                Indonesia's Trusted Cooperative for Pension Loans
                            </p>
                        </div>
                    </div>
=======
    <footer class="bg-gradient-to-r from-[#FFFFFF] via-[#FFE7B5] to-[#F9B733] shadow-[0_4px_20px_rgba(0,0,0,0.08)]">
        {{-- Decorative Elements --}}
        <div class="absolute top-0 right-0 w-96 h-96 bg-amber-500/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-amber-500/5 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 py-16">
            <div class="grid gap-12 md:grid-cols-4">
>>>>>>> a371920 (update 90%)

                {{-- Brand --}}
                <div class="space-y-4">
                    <img
                        src="{{ $globalSetting?->logo
                                ? asset('storage/'.$globalSetting->logo)
                                : asset('images/logo-gemilang.png') }}"
                        alt="Logo"
                        class="h-16"
                    >
                    <div>
<<<<<<< HEAD
                        <h4 class="text-xs font-semibold uppercase tracking-wide mb-3">
                            Menu Utama
                        </h4>
                        <ul class="space-y-1.5 text-sm">
                            <li><a href="{{ route('home') }}" class="hover:underline">Beranda</a></li>
                            <li><a href="{{ route('news.index') }}" class="hover:underline">Berita</a></li>
                            <li><a href="{{ route('products') }}" class="hover:underline">Produk</a></li>
                            <li><a href="{{ route('titik-layanan') }}" class="hover:underline">Titik Layanan</a></li>
                            <li><a href="{{ route('mitra') }}" class="hover:underline">Mitra</a></li>
                            <li><a href="{{ route('pengajuan') }}" class="hover:underline">Pengajuan Kredit</a></li>
                        </ul>
                    </div>

                    {{-- Kontak --}}
                    <div>
                        <h4 class="text-xs font-semibold uppercase tracking-wide mb-3">
                            Kontak
                        </h4>
                        <ul class="space-y-2 text-sm">
                            <li class="flex items-start gap-2">
                                <span class="mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 21s-6-5.3-6-10a6 6 0 0 1 12 0c0 4.7-6 10-6 10z"/>
                                        <circle cx="12" cy="11" r="2.5"/>
                                    </svg>
                                </span>
                                <span>{!! nl2br(e($addr)) !!}</span>
                            </li>

                            @if($phone)
                                <li class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.08 4.18 2 2 0 0 1 4.06 2h3a2 2 0 0 1 2 1.72 12.8 12.8 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.1 9.9a16 16 0 0 0 6 6l1.26-1.21a2 2 0 0 1 2.11-.45 12.8 12.8 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                    </svg>
                                    <span>{{ $phone }}</span>
                                </li>
                            @endif

                            @if($whatsapp)
                                <li class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.08 4.18 2 2 0 0 1 4.06 2h3a2 2 0 0 1 2 1.72 12.8 12.8 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.1 9.9a16 16 0 0 0 6 6l1.26-1.21a2 2 0 0 1 2.11-.45 12.8 12.8 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                    </svg>
                                    <span>{{ $whatsapp }}</span>
                                </li>
                            @endif

                            <li class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                  <rect x="3" y="5" width="18" height="14" rx="2" ry="2"></rect>
                                  <polyline points="3 7 12 13 21 7"></polyline>
                                </svg>

                                <span>{{ $email }}</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Sosial Media --}}
                    <div>
                        <h4 class="text-xs font-semibold uppercase tracking-wide mb-3">
                            Sosial Media
                        </h4>
                        <div class="flex items-center gap-3">
                            <a href="{{ $igUrl }}"
                               target="_blank"
                               class="w-8 h-8 rounded-full border border-[#0F7B3B]/70 flex items-center justify-center hover:bg-[#0F7B3B]/10">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="18" height="18" rx="5" ry="5"></rect>
                                    <circle cx="12" cy="12" r="4"></circle>
                                    <circle cx="17.5" cy="6.5" r="0.9" fill="currentColor"></circle>
                                </svg>
                            </a>

                            <a href="{{ $fbUrl }}"
                               target="_blank"
                               class="w-8 h-8 rounded-full border border-[#0F7B3B]/70 flex items-center justify-center hover:bg-[#0F7B3B]/10">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4" fill="currentColor">
                                    <path d="M13.5 22v-7h2.4l.4-3h-2.8v-2c0-.9.3-1.5 1.6-1.5H16V5.1C15.7 5 14.8 5 13.8 5 11.4 5 9.8 6.4 9.8 8.9V12H7v3h2.8v7h3.7z"/>
                                </svg>
                            </a>
                        </div>
=======
                        <h3 class="font-bold text-xl mb-2">
                            {{ $globalSetting->site_name ?? 'Koperasi Usaha Gilang Gemilang' }}
                        </h3>
                        <p class="text-sm text-black-400">
                            Indonesia's Trusted Cooperative for Pension Loans
                        </p>
>>>>>>> a371920 (update 90%)
                    </div>
                </div>

                {{-- Menu --}}
                <div>
                    <h4 class="text-sm font-bold uppercase tracking-wider mb-4 text-amber-400">
                        Menu Utama
                    </h4>
                    <ul class="space-y-2.5">
                        <li><a href="{{ route('home') }}" class="text-black-300 hover:text-amber-400 transition-colors text-sm">Beranda</a></li>
                        <li><a href="{{ route('news.index') }}" class="text-black-300 hover:text-amber-400 transition-colors text-sm">Berita</a></li>
                        <li><a href="{{ route('products') }}" class="text-black-300 hover:text-amber-400 transition-colors text-sm">Produk</a></li>
                        <li><a href="{{ route('titik-layanan') }}" class="text-black-300 hover:text-amber-400 transition-colors text-sm">Titik Layanan</a></li>
                        <li><a href="{{ route('mitra') }}" class="text-black-300 hover:text-amber-400 transition-colors text-sm">Mitra</a></li>
                    </ul>
                </div>

                {{-- Kontak --}}
                <div>
                    <h4 class="text-sm font-bold uppercase tracking-wider mb-4 text-amber-400">
                        Kontak
                    </h4>
                    <ul class="space-y-3 text-sm text-black-300">
                        <li class="flex gap-3">
                            <svg class="w-5 h-5 text-amber-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>{!! nl2br(e($addr)) !!}</span>
                        </li>

                        @if($phone)
                        <li class="flex gap-3">
                            <svg class="w-5 h-5 text-amber-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span>{{ $phone }}</span>
                        </li>
                        @endif

                        <li class="flex gap-3">
                            <svg class="w-5 h-5 text-amber-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>{{ $email }}</span>
                        </li>
                    </ul>
                </div>

                {{-- Social Media --}}
                <div>
                    <h4 class="text-sm font-bold uppercase tracking-wider mb-4 text-amber-400">
                        Sosial Media
                    </h4>
                    <div class="flex gap-3">
                        <a href="{{ $igUrl }}"
                           target="_blank"
                           class="w-12 h-12 rounded-xl bg-black/10 hover:bg-amber-400 flex items-center justify-center transition-all hover:scale-110 group">
                            <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5" stroke-width="2"/>
                                <circle cx="12" cy="12" r="4" stroke-width="2"/>
                                <circle cx="17.5" cy="6.5" r="1.5" fill="currentColor"/>
                            </svg>
                        </a>

                        <a href="{{ $fbUrl }}"
                           target="_blank"
                           class="w-12 h-12 rounded-xl bg-black/10 hover:bg-amber-400 flex items-center justify-center transition-all hover:scale-110 group">
                            <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13.5 22v-7h2.4l.4-3h-2.8v-2c0-.9.3-1.5 1.6-1.5H16V5.1C15.7 5 14.8 5 13.8 5 11.4 5 9.8 6.4 9.8 8.9V12H7v3h2.8v7h3.7z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Stats & Copyright --}}
            <div class="mt-12 pt-8 border-t border-white/10">
                <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                    {{-- Visitor Stats --}}
                    <div class="flex items-center gap-8">
                        <div class="text-center">
                            <div class="text-xs uppercase tracking-wide text-black-400 mb-1">
                                Hari Ini
                            </div>
                            <div class="text-2xl font-bold text-amber-400">
                                {{ number_format($todayVisitors) }}
                            </div>
                        </div>

                        <div class="h-12 w-px bg-white/20"></div>

                        <div class="text-center">
                            <div class="text-xs uppercase tracking-wide text-black-400 mb-1">
                                Total
                            </div>
                            <div class="text-2xl font-bold text-amber-400">
                                {{ number_format($totalVisitors) }}
                            </div>
                        </div>
                    </div>

                    {{-- Copyright --}}
                    <div class="text-sm text-black-400">
                        © {{ date('Y') }} Koperasi Usaha Gilang Gemilang. All rights reserved.
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 100,
        });
    </script>
</body>
</html>