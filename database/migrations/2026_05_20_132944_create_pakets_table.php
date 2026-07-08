<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('pakets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->text('deskripsi');
            $table->decimal('harga', 12, 2);
            $table->integer('kuota');
            $table->foreignId('id_mitra')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        Schema::dropIfExists('pakets');
    }
};