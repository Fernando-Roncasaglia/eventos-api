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
    Schema::create('movimentacoes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('estoque_id')->constrained('estoques')->onDelete('cascade');
        $table->enum('tipo', ['entrada', 'saida']);
        $table->integer('quantidade');
        $table->timestamp('data_hora')->useCurrent();
        $table->string('origem')->nullable();   // fornecedor, etc.
        $table->string('destino')->nullable();  // bar X, etc.
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimentacoes');
    }
};
