<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('reasons', function (Blueprint $table) {
            // jenis data: about = Tentang Kami, why = Kenapa Harus
            $table->string('type')->default('why')->after('id');
        });
    }

    public function down(): void
    {
        Schema::table('reasons', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
