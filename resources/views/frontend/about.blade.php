@extends('frontend.layout')

@section('title', 'Tentang Kami - Koperasi Usaha Gilang Gemilang')

@section('content')
<section class="py-10 bg-white">
    <div class="max-w-6xl mx-auto px-4">

        {{-- ===== Tentang Kami (intro) ===== --}}
        <div class="mb-10">
            <h1 class="text-3xl md:text-4xl font-bold mb-3">
                Tentang Kami
            </h1>

            <p class="text-sm md:text-base text-slate-700 leading-relaxed">
                {{ $aboutReason->description
                    ?? 'Belum ada deskripsi tentang kami. Silakan isi dari menu Alasan dengan jenis data "Tentang Kami".' }}
            </p>
        </div>

        {{-- ===== Kenapa harus Gilang Gemilang ===== --}}
        <div class="mb-8 text-center">
            <h2 class="text-2xl md:text-3xl font-bold mb-2">
                Kenapa harus Gilang Gemilang ?
            </h2>
            <p class="text-sm md:text-base text-slate-600">
                Beberapa alasan mengapa banyak pensiunan memilih Koperasi Usaha Gilang Gemilang.
            </p>
        </div>

        {{-- ===== Cards Alasan (Reason type = why) ===== --}}
        <div class="grid gap-6 md:grid-cols-3">
            @forelse($reasons as $reason)
                @php
                    // Ambil deskripsi dari field yang tersedia
                    $desc = $reason->description
                        ?? $reason->body
                        ?? $reason->content
                        ?? $reason->deskripsi
                        ?? null;
                @endphp

                <article class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden flex flex-col h-full">
                    {{-- Gambar --}}
                    @if($reason->image)
                        <div class="h-44 md:h-52 w-full overflow-hidden">
                            <img src="{{ asset('storage/'.$reason->image) }}"
                                 alt="{{ $reason->title }}"
                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                        </div>
                    @else
                        <div class="h-44 md:h-52 w-full bg-slate-100 flex items-center justify-center text-xs text-slate-500">
                            Tidak ada gambar
                        </div>
                    @endif

                    {{-- Teks --}}
                    <div class="p-4 flex-1 flex flex-col">
                        @if($reason->title)
                            <h3 class="font-semibold text-base md:text-lg mb-2 text-slate-900">
                                {{ $reason->title }}
                            </h3>
                        @endif

                        @if($desc)
                            <p class="text-sm text-slate-600 leading-relaxed">
                                {{ $desc }}
                            </p>
                        @endif
                    </div>
                </article>
            @empty
                <p class="text-center text-sm text-slate-500 col-span-3">
                    Belum ada data alasan. Tambahkan Reason dengan jenis data <strong>"Kenapa Harus"</strong> dari panel admin.
                </p>
            @endforelse
        </div>

    </div>
</section>
@endsection
