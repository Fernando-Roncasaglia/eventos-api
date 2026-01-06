<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movimentacao;   // importa o model
use App\Models\Estoque;        // importa o estoque para validar vínculo
use Illuminate\Http\Request;

class MovimentacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Movimentacao::with('estoque')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Movimentacao::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
