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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('kontak');
            $table->date('tanggal_berkunjung');

            //rating dari 1 sampai 12
            for ($i = 1; $i <= 12; $i++) {
                $table->tinyInteger("q{$i}_rating")->default(0); // rating 0–5
            }

            $table->text('komentar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
