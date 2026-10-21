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
    Schema::create('movimentacao', function (Blueprint $table) {
        $table->id('id_mov');
        $table->string('placa', 8);
        $table->foreignId('id_vaga')->constrained('vaga', 'id_vaga');
        $table->dateTime('data_entrada');
        $table->dateTime('data_saida')->nullable();
        $table->string('porteiro', 100)->nullable();

        $table->foreign('placa')->references('placa')->on('veiculo');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::dropIfExists('movimentacao');
}
};
