<?php

namespace App\Http\Controllers;

use App\Models\Carta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Carta::all();
        return view('card', compact('cards'));
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
        $cartaDiretorio = storage_path('app/public/cards');

        $nomeDoArquivo = $request->file('imagem')->getClientOriginalName();
        $numeroCard = $request->input('numero');
        $nomeCard = $request->input('nome');
        $atkCard = $request->input('atk');
        $defCard = $request->input('def');
        $passwordCard = $request->input('password');
        $custoCard = $request->input('custo');
        $nomeArquivo = Str::slug($nomeCard) . '_' . time() . '.' . $request->file('imagem')->getClientOriginalExtension();
        $imagemPath = $request->file('imagem')->storeAs('public/cards', $nomeArquivo);

        $card = new Carta([
            'numero' => $numeroCard,
            'nome' => $nomeCard,
            'imagem' => 'cards/'.$nomeArquivo
        ]);
        $card -> save();

        return view('/card');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carta  $carta
     * @return \Illuminate\Http\Response
     */
    public function show(Carta $carta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carta  $carta
     * @return \Illuminate\Http\Response
     */
    public function edit(Carta $carta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carta  $carta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carta $carta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carta  $carta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carta $carta)
    {
        //
    }
}
