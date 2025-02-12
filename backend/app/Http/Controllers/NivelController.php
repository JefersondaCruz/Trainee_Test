<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $show = Nivel::all();
        if ($show->isEmpty()) {
            return response()->json ([
                'message' => 'Nenhum nivel cadastrado!',
            ], 404);
        }
        return response()->json([
            'Niveis' => $show,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nivelData =  $request->validate( [
            'nivel' => 'required|string|max:100',
        ]);

        $nivelExiste = Nivel::where('nivel', $nivelData['nivel'])->first();

        if ($nivelExiste){
            return response()->json([
                'message' => 'Nivel já existe!',
            ],  404);
        }

        $nivel = Nivel::create([
            'nivel' => $nivelData['nivel'],
        ]);

        return response()->json([
            'nivel' => $nivel,
            'message' => 'Nivel criado com sucesso!',
        ],  201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nivelUP = $request->validate([
            'nivel' => 'required|string|max:100'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nivel = Nivel::find($id);
        if (!$nivel) {
            return response()->json([
                'message' => 'Nivel não encontrado!',
            ],  404);
        }
        $nivel->delete();
        return response()->json([
            'message' => 'Nivel excluído com sucesso!',
        ], 200);
    }
}
