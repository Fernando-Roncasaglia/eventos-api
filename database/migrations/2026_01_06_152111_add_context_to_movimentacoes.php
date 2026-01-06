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
        Schema::table('movimentacoes', function (Blueprint $table) {
            $table->foreignId('evento_id')->nullable()->constrained('eventos')->onDelete('set null');
            $table->foreignId('produto_id')->nullable()->constrained('produtos')->onDelete('set null');
            $table->foreignId('unidade_id')->nullable()->constrained('unidades')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movimentacoes', function (Blueprint $table) {
            //
        });
    }
};
