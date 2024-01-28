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
        Schema::create('jenis_akun', function (Blueprint $table) {
            $table->id();
            $table->string('kode_akun')->unique();
			$table->string('nama_akun');
            $table->string('type')->nullable();
            $table->string('laba_rugi')->nullable();
            $table->string('pemasukan')->nullable();
            $table->string('pengeluaran')->nullable();
            $table->boolean('status')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_akun');
    }
};
