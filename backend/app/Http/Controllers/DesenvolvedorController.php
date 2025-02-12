<?php

namespace App\Http\Controllers;

use App\Models\Desenvolvedor;
use Illuminate\Http\Request;

class DesenvolvedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $show = Desenvolvedor::all();
        if($show->isEmpty()){
            return response()->json([
                'message' => 'nenhum Desenvolvedor Cadastrado'
            ],404);
        }

        return response()->json([
            'desenvolvedores' => $show,
        ],200);
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
        $devData = $request->validate([
            'nivel_id'=> 'required|exists:niveis,id',
            'nome' => 'required|string|max:100',
            'sexo' => 'required|in:F,M',
            'data_nascimento' => 'required|date',
            'hobby' => 'required|string|max:255'
        ]);

        $desenvolvedor = Desenvolvedor::create($devData);

        return response()->json([
            'message' => 'Dev registrado com sucesso! ',
            'dev' => $desenvolvedor
        ], 201);

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
        $devData = Desenvolvedor::find($id);

        if(!$devData) {
            return response()->json([
                'Message' => 'desenvolvedor não encontrado'
            ],404);
        }

            $Data = $request->validate([
                'nivel_id'=> 'required|exists:niveis,id',
                'nome' => 'required|string|max:100',
                'sexo' => 'required|in:F,M',
                'data_nascimento' => 'required|date',
                'hobby' => 'required|string|max:255'
            ]);

            $devData->update($Data);

            return response()->json([
                'message' => 'Desenvolvedor atualizado com sucesso',
                'desenvolvedor' => $devData
            ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $devData = Desenvolvedor::find($id);

        if (!$devData) {
            return response()->json([
                'message' => 'Desenvolvedor não encontrado'
            ],400);
        }
        $devData->delete();
        return response()->json([
            'message' => 'desenvolvedor removido com sucesso'
        ],200);
    }
}
