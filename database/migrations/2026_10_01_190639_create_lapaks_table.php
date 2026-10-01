<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lapaks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasar_id')->constrained('pasars')->cascadeOnDelete();
            $table->foreignId('pedagang_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('nomor_lapak');
            $table->string('blok')->nullable();
            $table->string('ukuran')->nullable();
            $table->string('jenis_usaha')->nullable();
            $table->decimal('tarif_harian', 10, 2)->default(0);
            $table->enum('status', ['terisi', 'kosong', 'perbaikan'])->default('kosong');
            $table->string('qr_code_hash')->nullable();
            $table->string('qrcode_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lapaks');
    }
};