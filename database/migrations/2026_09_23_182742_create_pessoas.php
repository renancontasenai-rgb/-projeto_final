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
    Schema::create('pessoa', function (Blueprint $table) {
        $table->id('id_pessoa');
        $table->string('nome', 100);
        $table->enum('tipo', ['ALUNO', 'PROFESSOR', 'FUNC', 'VISITANTE']);
        $table->string('cpf', 11)->unique();
        $table->string('telefone', 20)->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::dropIfExists('pessoas');
}
};
