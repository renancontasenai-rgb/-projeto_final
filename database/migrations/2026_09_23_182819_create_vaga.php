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
    Schema::create('vaga', function (Blueprint $table) {
        $table->id('id_vaga');
        $table->string('numero', 10)->unique();
        $table->string('setor', 30);
        $table->enum('tipo_vaga', ['COMUM', 'PCD', 'IDOSO', 'MOTO']);
        $table->enum('status', ['LIVRE', 'OCUPADA'])->default('LIVRE');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::dropIfExists('vaga');
}
};
