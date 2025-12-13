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

    {{-- Alpine untuk interaksi (navbar mobile & pengaduan) --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        [x-cloak] { display: none !important; }

        /* pastikan tidak ada CSS global yang merusak ukuran svg */
        svg {
            display: inline-block;
            vertical-align: middle;
            /* jangan paksa ukuran di sini — gunakan atribut/class pada SVG */
        }
    </style>
</head>
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
                </div>
            </div>
        </div>
    </header>

    {{-- ========== KONTEN HALAMAN ========== --}}
    <main class="mt-4 md:mt-8">
        @yield('content')
    </main>

    {{-- ========== TOMBOL FLOATING PENGADUAN ========== --}}
    <button
        type="button"
        @click="openPengaduan = true"
        class="fixed bottom-5 right-4 md:bottom-10 md:right-10 z-40
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
        class="fixed inset-0 z-40 flex justify-end items-stretch md:items-center"
        aria-modal="true"
        role="dialog"
    >
        <div class="flex-1 bg-black/50" @click="openPengaduan = false"></div>

        <div
            class="w-full max-w-md h-full md:h-auto md:max-h-[560px] md:mr-10"
            x-transition:enter="transform transition ease-out duration-200"
            x-transition:enter-start="translate-x-full opacity-0"
            x-transition:enter-end="translate-x-0 opacity-100"
            x-transition:leave="transform transition ease-in duration-150"
            x-transition:leave-start="translate-x-0 opacity-100"
            x-transition:leave-end="translate-x-full opacity-0"
        >
            <div class="bg-white h-full md:h-auto rounded-none md:rounded-2xl shadow-2xl flex flex-col overflow-hidden">
                <div class="bg-gradient-to-r from-amber-400 via-amber-300 to-yellow-300 px-4 py-3 flex items-center justify-between">
                    <div>
                        <div class="text-xs uppercase font-semibold text-amber-900/80 tracking-wide">
                            Form Pengaduan
                        </div>
                        <h2 class="text-sm md:text-base font-bold text-amber-950">
                            Pengaduan, Kritik &amp; Saran
                        </h2>
                    </div>
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

                <div class="px-4 pt-3 pb-1 border-b border-slate-100 text-[11px] text-slate-500">
                    Laporkan disini apabila karyawan kami meminta imbalan dalam
                    bentuk apapun kepada NASABAH!
                </div>

                <div class="flex-1 overflow-y-auto p-4">
                    @if(session('status'))
                        <div class="mb-3 text-xs px-3 py-2 rounded bg-emerald-50 text-emerald-700 border border-emerald-200">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}" class="space-y-4 text-xs md:text-sm">
                        @csrf

                        <div>
                            <label class="block font-semibold mb-1">
                                Nama Anda
                            </label>
                            <input type="text" name="name"
                                   class="w-full border border-slate-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-400 text-sm"
                                   required>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div>
                                <label class="block font-semibold mb-1">
                                    Nomor Handphone
                                </label>
                                <input type="text" name="phone"
                                       class="w-full border border-slate-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-400 text-sm"
                                       required>
                            </div>

                            <div>
                                <label class="block font-semibold mb-1">
                                    Alamat Email
                                </label>
                                <input type="email" name="email"
                                       class="w-full border border-slate-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-400 text-sm">
                            </div>
                        </div>

                        <div>
                            <label class="block font-semibold mb-1">
                                Isi Keterangan
                            </label>
                            <textarea name="message" rows="4"
                                      class="w-full border border-slate-300 rounded-lg px-3 py-2 resize-none focus:outline-none focus:ring-2 focus:ring-amber-400 text-sm"
                                      required></textarea>
                        </div>

                        <div class="pt-1">
                            <button type="submit"
                                    class="w-full inline-flex items-center justify-center px-4 py-2.5 rounded-lg bg-amber-400 hover:bg-amber-500 text-sm font-semibold text-slate-900 shadow">
                                Kirim Pengaduan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- ========== FOOTER ========== --}}
    @php
        // Ambil dari kolom yang memang ada di migration
        $addr     = $globalSetting->address   ?? 'Jl. .......................';
        $phone    = $globalSetting->phone     ?? '021-123456';
        $whatsapp = $globalSetting->whatsapp  ?? null;
        $email    = $globalSetting->email     ?? 'pensiun.gemilang@gilanggemilang.id';
        $igUrl    = $globalSetting->instagram_url ?? 'https://instagram.com/gemilangkoperasi';
        $fbUrl    = $globalSetting->facebook_url  ?? '#';

        $todayVisitors = $todayVisitors ?? 0;
        $totalVisitors = $totalVisitors ?? 0;
    @endphp

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

                    {{-- Menu Utama --}}
                    <div>
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
                    </div>
                </div>

                {{-- Counter Pengunjung --}}
                <div class="mt-10 border-t border-[#0F7B3B]/25 pt-6">
                    <div class="flex flex-col md:flex-row items-center justify-center gap-8 text-center">
                        <div>
                            <div class="uppercase tracking-wide text-[11px] font-semibold">
                                Pengunjung Hari Ini
                            </div>
                            <div class="text-xl md:text-2xl font-bold">
                                {{ $todayVisitors }}
                            </div>
                        </div>

                        <div class="h-px w-16 bg-[#0F7B3B]/40 md:h-10 md:w-px"></div>

                        <div>
                            <div class="uppercase tracking-wide text-[11px] font-semibold">
                                Total Pengunjung
                            </div>
                            <div class="text-xl md:text-2xl font-bold">
                                {{ $totalVisitors }}
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 text-[11px] md:text-xs text-center opacity-90">
                        © {{ date('Y') }} Koperasi Usaha Gilang Gemilang. Hak Cipta Dilindungi.
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
