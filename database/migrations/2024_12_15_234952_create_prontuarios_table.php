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
        Schema::create('prontuarios', function (Blueprint $table) {
            $table->id(); // Chave primária

            $table->foreignId('id_consulta') // Chave estrangeira para a tabela users/medicos
                  ->constrained('consultas')
                  ->onDelete('cascade');

            $table->string('diagnostico')->nullable(); // Diagnóstico

            $table->text('tratamento')->nullable(); // Tratamento sugerido

            $table->string('exames_solicitados')->nullable(); // Exames solicitados || futura insersao separada, Exames associados (nomes e resultados)
            $table->string('prescricao')->nullable(); // Prescrição médica

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prontuarios');
    }
};
