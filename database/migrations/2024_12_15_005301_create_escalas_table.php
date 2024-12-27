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
        Schema::create('escalas', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->integer('quantidade')->default(0);
            $table->foreignId('id_medico')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['data', 'id_medico'], 'unique_data_medico');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('escalas');
    }
};
