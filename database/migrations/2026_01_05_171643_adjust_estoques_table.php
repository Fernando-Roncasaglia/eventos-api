<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('estoques', function (Blueprint $table) {
            // Remove o campo quantidade_total
            $table->dropColumn('quantidade_total');

            // Se quiser, pode adicionar unidade_id para vincular a unidade
            $table->foreignId('unidade_id')
                  ->nullable()
                  ->constrained('unidades')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('estoques', function (Blueprint $table) {
            // Reverte as alterações
            $table->integer('quantidade_total')->default(0);
            $table->dropConstrainedForeignId('unidade_id');
        });
    }
};