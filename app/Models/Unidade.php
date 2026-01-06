<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $fillable = ['produto_id', 'sigla', 'quantidade_por_pack', 'descricao'];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}

