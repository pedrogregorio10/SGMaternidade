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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id(); // Chave primária

            $table->foreignId('id_paciente')
                  ->constrained('pacientes')
                  ->onDelete('cascade');

            $table->foreignId('id_medico')
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->foreignId('id_escala')->constrained('escalas')->onDelete('cascade');

            $table->enum('tipo', ['pos', 'pre']);
            $table->enum('status', ['pendente', 'realizada', 'cancelada'])
                  ->default('pendente');
            $table->text('motivo')->nullable();
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
