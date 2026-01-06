<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    public function index()
    {
        return Unidade::with('produto')->get();
    }

    public function store(Request $request)
    {
        $unidade = Unidade::create($request->all());
        return response()->json($unidade, 201);
    }

    public function show($id)
    {
        return Unidade::with('produto')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $unidade = Unidade::findOrFail($id);
        $unidade->update($request->all());
        return response()->json($unidade, 200);
    }

    public function destroy($id)
    {
        Unidade::destroy($id);
        return response()->json(null, 204);
    }
}