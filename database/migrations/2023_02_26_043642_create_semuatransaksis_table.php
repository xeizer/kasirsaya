<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('semuatransaksis', function (Blueprint $table) {
            $table->id();
            $table->string('pelanggan');
            $table->unsignedBigInteger('id_barang');
            $table->integer('jumlah');
            $table->integer('total');
            $table->timestamps();
            $table->foreign('id_barang')->references('id')->on('barangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semuatransaksis');
    }
};
