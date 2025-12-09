<?php

namespace App\Http\Controllers;

use App\Models\Mitra;

class MitraController extends Controller
{
    public function index()
    {
        $mitraPendana = Mitra::query()
            ->where('is_active', true)
            ->where('type', 'pendana')
            ->orderBy('sort_order')
            ->get();

        $mitraJuruBayar = Mitra::query()
            ->where('is_active', true)
            ->where('type', 'juru_bayar')
            ->orderBy('sort_order')
            ->get();

        return view('frontend.mitra', [
            'mitraPendana'   => $mitraPendana,
            'mitraJuruBayar' => $mitraJuruBayar,
        ]);
    }
}
