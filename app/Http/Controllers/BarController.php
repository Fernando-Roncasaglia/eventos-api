<?php

namespace App\Http\Controllers;

use App\Models\Bar;
use Illuminate\Http\Request;

class BarController extends Controller
{
    public function index()
    {
        return Bar::all();
    }

    public function store(Request $request)
    {
        $bar = Bar::create($request->all());
        return response()->json($bar, 201);
    }

    public function show($id)
    {
        return Bar::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $bar = Bar::findOrFail($id);
        $bar->update($request->all());
        return response()->json($bar, 200);
    }

    public function destroy($id)
    {
        Bar::destroy($id);
        return response()->json(null, 204);
    }
}