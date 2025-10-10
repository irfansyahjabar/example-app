<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('stok_lpg', function (Blueprint $table) {
            $table->id();
            $table->string('jenis'); // LPG 3kg, 5kg, 12kg, 50kg
            $table->integer('stok');
            $table->decimal('harga', 12, 2);
            $table->enum('status', ['adequate', 'low', 'critical']);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('stok_lpg');
    }
};

