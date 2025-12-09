<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Deskripsi singkat (ditampilkan di kartu produk)
            if (!Schema::hasColumn('products', 'short_description')) {
                $table->text('short_description')->nullable()->after('name');
            }

            // Deskripsi lengkap (konten RichEditor / full HTML)
            if (!Schema::hasColumn('products', 'description')) {
                $table->longText('description')->nullable()->after('short_description');
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'short_description')) {
                $table->dropColumn('short_description');
            }

            if (Schema::hasColumn('products', 'description')) {
                $table->dropColumn('description');
            }
        });
    }
};
