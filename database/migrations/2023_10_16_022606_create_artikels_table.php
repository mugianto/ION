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
        Schema::create('artikels', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_penulis')->unsigned();
            $table->foreign('id_penulis')->references('id')->on('users')->onDelete('restrict');
            $table->bigInteger('id_kategori')->unsigned();
            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('restrict');
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('kutipan');
            $table->text('isi_artikel');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};
