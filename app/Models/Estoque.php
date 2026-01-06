<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $fillable = ['produto_id', 'evento_id', 'quantidade_total'];

    // Relação: estoque pertence a um produto
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    // Relação: estoque pertence a um evento
    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

    // Relação: estoque tem muitas movimentações
    public function movimentacoes()
    {
        return $this->hasMany(Movimentacao::class);
    }

}
