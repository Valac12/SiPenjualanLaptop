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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('namaPelanggan');
            $table->string('namaLaptop');
            $table->unsignedBigInteger('pelanggan_id');
            $table->unsignedBigInteger('laptop_id');
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans');
            $table->foreign('laptop_id')->references('id')->on('laptops');
            $table->string('Qty');
            $table->string('harga');
            $table->string('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
