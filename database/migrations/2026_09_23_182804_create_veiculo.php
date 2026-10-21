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
        $table->string('tipo', 50);
        $table->unsignedBigInteger('id_pessoa');
        $table->foreign('id_pessoa')->references('id')->on('pessoas')->onDelete('cascade');

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
