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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->string('nama_hewan');
            $table->string('jenis_hewan');
            $table->string('ras_hewan');
            $table->enum('jenis_kelamin', ['Jantan', 'Betina']);
            $table->string('umur')->nullable();
            $table->enum('status_vaksinasi', ['Belum', 'Lengkap', 'Perlu Booster']);
            $table->text('catatan_khusus')->nullable();

            // Foreign key
            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
