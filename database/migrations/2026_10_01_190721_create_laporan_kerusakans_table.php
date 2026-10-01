<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('laporan_kerusakans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasar_id')->constrained('pasars')->cascadeOnDelete();
            $table->foreignId('lapak_id')->nullable()->constrained('lapaks')->nullOnDelete();
            $table->foreignId('pedagang_id')->constrained('users')->cascadeOnDelete();
            $table->string('judul_laporan');
            $table->text('deskripsi');
            $table->string('foto_path')->nullable();
            $table->enum('status', ['pending', 'diproses', 'selesai', 'ditolak'])->default('pending');
            $table->text('tanggapan_admin')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan_kerusakans');
    }
};