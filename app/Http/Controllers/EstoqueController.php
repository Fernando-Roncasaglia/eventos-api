<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use App\Models\Movimentacao;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    public function index()
    {
        return Estoque::with('produto', 'evento')->get();
    }

    public function entrada(Request $request)
    {
        // validação dos campos
        $request->validate([
            'evento_id'   => 'required|exists:eventos,id',
            'produto_id'  => 'required|exists:produtos,id',
            'unidade_id'  => 'required|exists:unidades,id',
            'quantidade'  => 'required|integer|min:1',
            'origem'      => 'nullable|string',
        ]);

        // encontra ou cria o estoque do produto no evento
        $estoque = Estoque::where('evento_id', $request->evento_id)
            ->where('produto_id', $request->produto_id)
            ->where('unidade_id', $request->unidade_id)
            ->first();

        if (!$estoque) {
            $estoque = Estoque::create([
                'evento_id'  => $request->evento_id,
                'produto_id' => $request->produto_id,
                'unidade_id' => $request->unidade_id,
            ]);
        }


        Movimentacao::create([
            'estoque_id' => $estoque->id,
            'tipo'       => 'entrada',
            'quantidade' => $request->quantidade,
            'origem'     => $request->origem,
            'destino'    => $request->destino,
            'bar_id'     => $request->bar_id,
            'data_hora'  => now(),

            // contexto congelado
            'evento_id'  => $estoque->evento_id,
            'produto_id' => $estoque->produto_id,
            'unidade_id' => $estoque->unidade_id,
        ]);


        // calcula saldo atual (entradas - saídas)
        $entradas = Movimentacao::where('estoque_id', $estoque->id)
            ->where('tipo', 'entrada')
            ->sum('quantidade');

        $saidas = Movimentacao::where('estoque_id', $estoque->id)
            ->where('tipo', 'saida')
            ->sum('quantidade');

        $saldo = $entradas - $saidas;

        return response()->json([
            'estoque_id' => $estoque->id,
            'saldo'      => $saldo,
        ], 200);
    }



    public function saida(Request $request)
    {
        // validação dos campos
        $request->validate([
            'evento_id'   => 'required|exists:eventos,id',
            'produto_id'  => 'required|exists:produtos,id',
            'unidade_id'  => 'required|exists:unidades,id',
            'bar_id'      => 'required|exists:bares,id',
            'quantidade'  => 'required|integer|min:1',
            'destino'     => 'nullable|string',
        ]);

        // encontra o estoque do produto no evento
        $estoque = Estoque::where('evento_id', $request->evento_id)
            ->where('produto_id', $request->produto_id)
            ->where('unidade_id', $request->unidade_id)
            ->first();

        if (!$estoque) {
            $estoque = Estoque::create([
                'evento_id'  => $request->evento_id,
                'produto_id' => $request->produto_id,
                'unidade_id' => $request->unidade_id,
            ]);
        }


        Movimentacao::create([
            'estoque_id' => $estoque->id,
            'tipo'       => 'saida',
            'quantidade' => $request->quantidade,
            'origem'     => $request->origem,
            'destino'    => $request->destino,
            'bar_id'     => $request->bar_id,
            'data_hora'  => now(),

            // contexto congelado
            'evento_id'  => $estoque->evento_id,
            'produto_id' => $estoque->produto_id,
            'unidade_id' => $estoque->unidade_id,
        ]);


        // calcula saldo atual (entradas - saídas)
        $entradas = Movimentacao::where('estoque_id', $estoque->id)
            ->where('tipo', 'entrada')
            ->sum('quantidade');

        $saidas = Movimentacao::where('estoque_id', $estoque->id)
            ->where('tipo', 'saida')
            ->sum('quantidade');

        $saldo = $entradas - $saidas;

        return response()->json([
            'estoque_id' => $estoque->id,
            'saldo'      => $saldo,
        ], 200);
    }

}