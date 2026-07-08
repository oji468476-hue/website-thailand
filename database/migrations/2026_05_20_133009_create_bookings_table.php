<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('package_id')->constrained('pakets')->onDelete('cascade');
            $table->date('departure_date');
            $table->integer('participants');
            $table->decimal('total_price', 12, 2);
            $table->enum('status', ['pending', 'confirmed', 'rejected', 'completed'])->default('pending');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};