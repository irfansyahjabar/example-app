<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('stok_lpg', function (Blueprint $table) {
            if (Schema::hasColumn('stok_lpg', 'penjual_id')) {
                $table->dropColumn('penjual_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('stok_lpg', function (Blueprint $table) {
            $table->unsignedBigInteger('penjual_id')->nullable();
        });
    }
};
