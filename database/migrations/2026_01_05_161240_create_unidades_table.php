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
    Schema::create('unidades', function (Blueprint $table) {
        $table->id();
        $table->foreignId('produto_id')->constrained('produtos')->onDelete('cascade');
        $table->string('sigla'); // ex.: DZ
        $table->integer('quantidade_por_pack'); // ex.: 12
        $table->string('descricao')->nullable(); // ex.: Dúzia
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidades');
    }
};
