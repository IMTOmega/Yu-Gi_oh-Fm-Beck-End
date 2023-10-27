<?php

namespace App\Http\Controllers;

use App\Models\Personagem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PersonagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personagens = Personagem::all();
        return view('persona', compact('personagens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $personaDirectory = storage_path('app/public/persona');

        $nomeArquivoOriginal = $request->file('imagem')->getClientOriginalName();
        $nomePersonagem = $request->input('nome');
        $nomeArquivo = Str::slug($nomePersonagem) . '_' . time() . '.' . $request->file('imagem')->getClientOriginalExtension();
        $imagemPath = $request->file('imagem')->storeAs('public/persona', $nomeArquivo);

        $persona = new Personagem([
            'nome' => $nomePersonagem,
            'imagem' => 'persona/' . $nomeArquivo,
        ]);

        $persona->save();

        return redirect('persona')->with('success', 'Personagem cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personagem  $personagem
     * @return \Illuminate\Http\Response
     */
    public function show(Personagem $personagem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personagem  $personagem
     * @return \Illuminate\Http\Response
     */
    public function edit(Personagem $personagem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personagem  $personagem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personagem $personagem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personagem  $personagem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personagem $personagem)
    {
        //
    }
}
