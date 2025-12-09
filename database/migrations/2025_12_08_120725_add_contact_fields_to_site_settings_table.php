<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            // Tambahan hero
            if (! Schema::hasColumn('site_settings', 'hero_background_2')) {
                $table->string('hero_background_2')->nullable()->after('hero_background');
            }

            if (! Schema::hasColumn('site_settings', 'hero_background_3')) {
                $table->string('hero_background_3')->nullable()->after('hero_background_2');
            }

            // Kontak
            if (! Schema::hasColumn('site_settings', 'address')) {
                $table->text('address')->nullable()->after('hero_background_3');
            }

            if (! Schema::hasColumn('site_settings', 'phone')) {
                $table->string('phone', 50)->nullable()->after('address');
            }

            if (! Schema::hasColumn('site_settings', 'whatsapp')) {
                $table->string('whatsapp', 50)->nullable()->after('phone');
            }

            if (! Schema::hasColumn('site_settings', 'email')) {
                $table->string('email', 191)->nullable()->after('whatsapp');
            }

            // Sosmed
            if (! Schema::hasColumn('site_settings', 'instagram_url')) {
                $table->string('instagram_url')->nullable()->after('email');
            }

            if (! Schema::hasColumn('site_settings', 'facebook_url')) {
                $table->string('facebook_url')->nullable()->after('instagram_url');
            }
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            if (Schema::hasColumn('site_settings', 'hero_background_2')) {
                $table->dropColumn('hero_background_2');
            }

            if (Schema::hasColumn('site_settings', 'hero_background_3')) {
                $table->dropColumn('hero_background_3');
            }

            if (Schema::hasColumn('site_settings', 'address')) {
                $table->dropColumn('address');
            }

            if (Schema::hasColumn('site_settings', 'phone')) {
                $table->dropColumn('phone');
            }

            if (Schema::hasColumn('site_settings', 'whatsapp')) {
                $table->dropColumn('whatsapp');
            }

            if (Schema::hasColumn('site_settings', 'email')) {
                $table->dropColumn('email');
            }

            if (Schema::hasColumn('site_settings', 'instagram_url')) {
                $table->dropColumn('instagram_url');
            }

            if (Schema::hasColumn('site_settings', 'facebook_url')) {
                $table->dropColumn('facebook_url');
            }
        });
    }
};
