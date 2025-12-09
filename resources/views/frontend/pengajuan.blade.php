{{-- resources/views/frontend/pengajuan.blade.php --}}
@extends('frontend.layout')

@section('title', 'Pengajuan Kredit - Koperasi Usaha Gilang Gemilang')

@section('content')
<section class="py-12 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-2xl md:text-3xl font-bold mb-4">
            Pengajuan Kredit
        </h1>

        <p class="text-slate-700 mb-6">
            Untuk proses pengajuan kredit pensiunan, silakan gunakan WhatsApp khusus
            pengajuan kredit Koperasi Usaha Gilang Gemilang.
        </p>

        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <p class="text-sm text-slate-600 mb-4">
                Klik tombol di bawah ini untuk menuju Admin pengajuan kredit.
            </p>

            {{-- TODO: ganti URL ini dengan URL aplikasi pengajuan kredit yang sebenarnya --}}
            <a href="https://api.whatsapp.com/send?phone=6288225000199"
               target="_blank"
               class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-amber-400 hover:bg-amber-500 text-sm font-semibold text-slate-900 transition-colors">
                Buka WhatsApp Pengajuan Kredit
            </a>
        </div>
    </div>
</section>
@endsection
