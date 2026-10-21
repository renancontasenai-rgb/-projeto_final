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
    Schema::create('veiculo', function (Blueprint $table) {
        $table->string('placa', 8)->primary();
        $table->string('modelo', 50);
        $table->string('cor', 30)->nullable();
        $table->enum('tipo', ['CARRO', 'MOTO', 'VAN']);
        $table->foreignId('id_pessoa')
              ->constrained('pessoa', 'id_pessoa')
              ->restrictOnDelete()
              ->cascadeOnUpdate();
    });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::dropIfExists('veiculo');
}
};
