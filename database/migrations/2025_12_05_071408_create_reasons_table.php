<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reasons', function (Blueprint $table) {
             $table->id();
             $table->string('type'); // about | why
             $table->string('key')->nullable(); // informasi_umum, visi, misi, dll
             $table->string('title')->nullable();
             $table->longText('description')->nullable();
              $table->string('image')->nullable();
             $table->unsignedInteger('sort_order')->default(0);
             $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reasons');
    }
};
