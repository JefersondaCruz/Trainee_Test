<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
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

    public function update(Request $request, string $id)
    {
        $nivel = Nivel::find($id);

        if (!$nivel) {
            return response()->json([
                'message' => 'Nivel não encontrado',
            ], 400);
        }

        $request->validate([
            'nivel' => 'required|string|max:100'
        ]);

        $nivel->update([
            'nivel' => $request->nivel,
        ]);

        return response()->json([
            'message' => 'nivel atualizado com sucesso',
            'Nivel' => $nivel
        ], 200);
    }

    public function destroy(string $id)
    {
        $nivel = Nivel::find($id);
        if (!$nivel) {
            return response()->json([
                'message' => 'Nivel não encontrado!',
            ],  404);
        }

        if ($nivel->Desenvolvedores()->exists()) {
            return response()->json([
                'message' => 'não e possivel excluir este nivel, pois há desenvolvedores associados',
            ],400);
        }

        $nivel->delete();
        return response()->json([
            'message' => 'Nivel excluído com sucesso!',
        ], 200);
    }
}
