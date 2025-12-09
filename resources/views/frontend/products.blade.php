@extends('frontend.layout')

@section('title', 'Produk - Koperasi Usaha Gilang Gemilang')

@section('content')
<section class="py-10 bg-slate-50">
    <div class="max-w-6xl mx-auto px-4">
        <h1 class="text-3xl font-bold mb-4 text-center">Produk Kami</h1>

        <div class="grid gap-6 md:grid-cols-3">
            @forelse($products as $product)
                <a href="{{ route('product.show', $product) }}"
                   class="bg-white rounded-lg shadow overflow-hidden flex flex-col hover:shadow-lg transition">

                    @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}"
                             alt="{{ $product->name }}"
                             class="w-full h-60 object-cover">
                    @endif

                    <div class="p-4 flex-1 flex flex-col">
                        <h2 class="font-semibold mb-2">{{ $product->name }}</h2>
                        <p class="text-sm text-slate-600 flex-1">
                            {{ $product->short_description }}
                        </p>

                        <span class="mt-3 text-emerald-700 text-sm font-medium">
                            Lihat Selengkapnya →
                        </span>
                    </div>
                </a>
            @empty
                <p class="text-sm text-slate-500 col-span-3 text-center">
                    Belum ada produk yang aktif.
                </p>
            @endforelse
        </div>
    </div>
</section>
@endsection
