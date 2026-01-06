<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    // força o nome correto da tabela
    protected $table = 'movimentacoes';

    protected $fillable = [
        'estoque_id',
        'tipo',
        'quantidade',
        'origem',
        'destino',
        'bar_id',
        'data_hora',
        'evento_id',
        'produto_id',
        'unidade_id',
    ];

    // relacionamento: uma movimentação pertence a um estoque
    public function estoque()
    {
        return $this->belongsTo(Estoque::class);
    }
}