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
        Schema::create('table1s', function (Blueprint $table) {
            $table->id();
            $table->dateTime('waktu_mulai')->unique();
            $table->dateTime('waktu_akhir')->unique();
            // $table->string('kode_booking')->nullable();
            $table->integer('harga');
            $table->string('bukti_pembayaran');
            $table->string('keterangan')->nullable();
            $table->enum('status_booking', ['pending', 'booked'])->default('pending');
            $table->enum('status_pembayaran', ['belum_dikonfirmasi', 'sudah_dikonfirmasi'])->default('belum_dikonfirmasi');
            $table->foreignId('member_id')->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table1s');
    }
};
