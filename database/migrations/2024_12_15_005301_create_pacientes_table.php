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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id(); // A chave primária será um campo unsignedBigInteger
            $table->string('nome');
            $table->date('data_nascimento');
            $table->string('n_bi')->unique();
            $table->string('provincia');
            $table->string('municipio');
            $table->string('telefone');
            $table->enum('estado',['solteiro/a','casado/a']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
