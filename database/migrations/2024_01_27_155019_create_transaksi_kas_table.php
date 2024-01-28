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
        Schema::create('transaksi_kas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi')->unique();
            $table->date('tanggal_catat');
            $table->integer('jumlah');
            $table->string('keterangan')->nullable();
            $table->string('jenis_transaksi');
            $table->foreignId('dari_jenis_kas_id')->nullable()->constrained('jenis_kas')->cascadeOnUpdate()->cascadeOnDelete();
			$table->foreignId('untuk_jenis_kas_id')->nullable()->constrained('jenis_kas')->cascadeOnUpdate()->cascadeOnDelete();
			$table->foreignId('jenis_akun_id')->nullable()->constrained('jenis_akun')->cascadeOnUpdate()->cascadeOnDelete();
			$table->string('dk')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_kas');
    }
};
