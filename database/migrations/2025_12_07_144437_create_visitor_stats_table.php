<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('visitor_stats', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique();          // tanggal kunjungan
            $table->unsignedBigInteger('count')->default(0); // jumlah view
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitor_stats');
    }
};
