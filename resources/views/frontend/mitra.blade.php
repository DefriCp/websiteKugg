@extends('frontend.layout')

@section('title', 'Mitra Kerjasama - Koperasi Usaha Gilang Gemilang')

@section('content')
<section class="py-10 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <h1 class="text-2xl md:text-3xl font-bold mb-2">
            Mitra Kerjasama
        </h1>
        <p class="text-sm md:text-base text-slate-600 mb-6 max-w-3xl">
            Koperasi Usaha Gilang Gemilang bekerja sama dengan berbagai mitra pendana dan mitra juru bayar
            untuk memberikan layanan kredit pensiun yang aman dan terpercaya.
        </p>

        {{-- ========= Mitra Pendana ========= --}}
        <section class="mb-8">
            <h2 class="text-xl font-semibold mb-3">
                Mitra Pendana
            </h2>

            @if($mitraPendana->isEmpty())
                <p class="text-sm text-slate-500">
                    Belum ada data mitra pendana.
                </p>
            @else
                <div class="grid gap-4 md:grid-cols-2">
                    @foreach($mitraPendana as $mitra)
                        <article class="bg-slate-50 border border-slate-200 rounded-2xl p-4 flex gap-3">
                            @if($mitra->logo_path)
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('storage/'.$mitra->logo_path) }}"
                                         alt="{{ $mitra->name }}"
                                         class="w-12 h-12 rounded-full object-cover">
                                </div>
                            @endif

                            <div>
                                <h3 class="font-semibold text-base mb-1">
                                    {{ $mitra->name }}
                                </h3>

                                @if($mitra->description)
                                    <p class="text-sm text-slate-600 mb-1">
                                        {{ $mitra->description }}
                                    </p>
                                @endif

                                @if($mitra->website)
                                    <a href="{{ $mitra->website }}"
                                       target="_blank"
                                       class="text-xs font-semibold text-amber-600 hover:underline">
                                        Kunjungi Website
                                    </a>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </section>

        {{-- ========= Mitra Juru Bayar ========= --}}
        <section>
            <h2 class="text-xl font-semibold mb-3">
                Mitra Juru Bayar
            </h2>

            @if($mitraJuruBayar->isEmpty())
                <p class="text-sm text-slate-500">
                    Belum ada data mitra juru bayar.
                </p>
            @else
                <div class="grid gap-4 md:grid-cols-2">
                    @foreach($mitraJuruBayar as $mitra)
                        <article class="bg-slate-50 border border-slate-200 rounded-2xl p-4 flex gap-3">
                            @if($mitra->logo_path)
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('storage/'.$mitra->logo_path) }}"
                                         alt="{{ $mitra->name }}"
                                         class="w-12 h-12 rounded-full object-cover">
                                </div>
                            @endif

                            <div>
                                <h3 class="font-semibold text-base mb-1">
                                    {{ $mitra->name }}
                                </h3>

                                @if($mitra->description)
                                    <p class="text-sm text-slate-600 mb-1">
                                        {{ $mitra->description }}
                                    </p>
                                @endif

                                @if($mitra->website)
                                    <a href="{{ $mitra->website }}"
                                       target="_blank"
                                       class="text-xs font-semibold text-amber-600 hover:underline">
                                        Kunjungi Website
                                    </a>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </section>
    </div>
</section>
@endsection
