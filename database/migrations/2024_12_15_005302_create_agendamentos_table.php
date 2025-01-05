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
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('data_nascimento');
            $table->string('n_bi');
            $table->string('provincia');
            $table->string('municipio');
            $table->string('telefone');
            $table->enum('estado',['solteiro/a','casado/a']);
            $table->enum('tipo', ['pos', 'pre']);
            $table->foreignId('id_medico')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_escala')->constrained('escalas')->onDelete('cascade');
            $table->enum('status', ['confirmado', 'cancelado'])->default('confirmado');
            $table->string('motivo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};
