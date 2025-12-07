@extends('frontend.layout')

@section('title', 'Tentang Kami - Koperasi Usaha Gilang Gemilang')

@section('content')
<section class="py-10 bg-white">
    <div class="max-w-6xl mx-auto px-4">

        {{-- Judul fix, deskripsi dari Reason type=about --}}
        <h1 class="text-3xl font-bold mb-3">Tentang Kami</h1>

        <p class="text-sm md:text-base text-slate-700 mb-8">
            {{ $aboutReason->description ?? 'Belum ada deskripsi tentang kami. Silakan isi dari menu Alasan dengan jenis data "Tentang Kami".' }}
        </p>

        {{-- Judul utama untuk alasan --}}
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-8">
            Kenapa harus Gilang Gemilang ?
        </h2>

        {{-- 3 gambar seperti di PDF, Reason type=why --}}
        <div class="grid gap-6 md:grid-cols-3">
            @forelse($reasons as $reason)
                <div class="flex justify-center">
                    @if($reason->image)
                        <img src="{{ asset('storage/'.$reason->image) }}"
                             alt="{{ $reason->title }}"
                             class="w-full max-w-xs md:max-w-none object-cover">
                    @else
                        <div class="w-full max-w-xs h-64 bg-slate-200 flex items-center justify-center text-sm text-slate-500">
                            Tidak ada gambar
                        </div>
                    @endif
                </div>
            @empty
                <p class="text-center text-sm text-slate-500 col-span-3">
                    Belum ada data alasan. Tambahkan Reason dengan jenis data "Kenapa Harus" dari panel admin.
                </p>
            @endforelse
        </div>

    </div>
</section>
@endsection
