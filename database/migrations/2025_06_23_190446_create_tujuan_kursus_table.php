<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tujuan_kursus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kursus_id')
                  ->constrained('kursus')
                  ->onDelete('cascade');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tujuan_kursus');
    }
};
