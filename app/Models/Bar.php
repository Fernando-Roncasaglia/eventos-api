<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bar extends Model
{
    protected $table = 'bares'; // 👈 força o nome correto da tabela
    protected $fillable = ['evento_id', 'nome', 'responsavel'];

    // Relação: um bar pertence a um evento
    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

}
