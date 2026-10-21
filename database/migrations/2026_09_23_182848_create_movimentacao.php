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
        $table->unsignedBigInteger('vaga_id');
        $table->foreign('vaga_id')->references('id')->on('vaga')->onDelete('cascade');
        $table->dateTime('data_entrada');
        $table->dateTime('data_saida')->nullable();
        $table->string('porteiro', 100)->nullable();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::dropIfExists('movimentacao');

    Schema::table('movimentacao', function (Blueprint $table) {
        $table->dropForeign(['vaga_id']);
        $table->dropColumn('vaga_id');
    });
}
};
