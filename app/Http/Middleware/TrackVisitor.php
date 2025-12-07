<?php

namespace App\Http\Middleware;

use App\Models\VisitorStat;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    public function handle(Request $request, Closure $next): Response
    {
        // Biar hanya hit untuk halaman web (bukan API)
        if ($request->isMethod('get') && ! $request->is('admin/*')) {

            $today = now()->toDateString();

            // bisa ditambah filter IP kalau mau unik per IP
            VisitorStat::query()
                ->firstOrCreate(['date' => $today])
                ->increment('count');
        }

        return $next($request);
    }
}
