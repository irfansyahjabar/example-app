<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('stok_lpg', function (Blueprint $table) {
            $table->unsignedBigInteger('penjual_id')->after('id')->nullable();
            $table->foreign('penjual_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('stok_lpg', function (Blueprint $table) {
            $table->dropForeign(['penjual_id']);
            $table->dropColumn('penjual_id');
        });
    }

};
