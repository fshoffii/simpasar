<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('transaksi_retribusis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasar_id')->constrained('pasars')->cascadeOnDelete();
            $table->foreignId('lapak_id')->constrained('lapaks')->cascadeOnDelete();
            $table->foreignId('kolektor_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('pedagang_id')->nullable()->constrained('users')->nullOnDelete();
            $table->decimal('nominal', 10, 2);
            $table->enum('metode_pembayaran', ['cash', 'qris'])->default('cash');
            $table->enum('status_pembayaran', ['lunas', 'pending', 'gagal'])->default('lunas');
            $table->string('kode_transaksi')->unique();
            $table->timestamp('tanggal_bayar');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi_retribusis');
    }
};