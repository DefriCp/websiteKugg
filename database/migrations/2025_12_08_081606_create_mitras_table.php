<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mitras', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            // pendana / juru_bayar
            $table->enum('type', ['pendana', 'juru_bayar']);

            $table->string('logo_path')->nullable();   // file upload
            $table->string('website')->nullable();
            $table->text('description')->nullable();

            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mitras');
    }
};
