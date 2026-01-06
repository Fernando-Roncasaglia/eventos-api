<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        return Evento::all();
    }

    public function store(Request $request)
    {
        $evento = Evento::create($request->all());
        return response()->json($evento, 201);
    }

    public function show($id)
    {
        return Evento::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $evento = Evento::findOrFail($id);
        $evento->update($request->all());
        return response()->json($evento, 200);
    }

    public function destroy($id)
    {
        Evento::destroy($id);
        return response()->json(null, 204);
    }
}
