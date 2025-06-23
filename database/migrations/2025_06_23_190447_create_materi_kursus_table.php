<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('materi_kursus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kursus_id')
                  ->constrained('kursus')
                  ->onDelete('cascade');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->unsignedInteger('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materi_kursus');
    }
};
