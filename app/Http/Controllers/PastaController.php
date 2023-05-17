<?php

namespace App\Http\Controllers;

use App\Models\Pasta;
use Illuminate\Http\Request;

class PastaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pastas = Pasta::all();

        return view('pastas/index', compact('pastas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pastas/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->all();

        $newPasta = new Pasta();

        // $newPasta->title = $formData['title'];
        // $newPasta->description = $formData['description'];
        // $newPasta->type = $formData['type'];
        // $newPasta->src = $formData['src'];
        // $newPasta->cooking_time = $formData['cooking_time'];
        // $newPasta->weight = $formData['weight'];
        
        // metodo che in automatico assegna ad ogni proprietà del model il valore che ci passa il form
        $newPasta->fill($formData);
        
        $newPasta->save();

        return redirect()->route('pastas.show', $newPasta->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasta  $pasta
     * @return \Illuminate\Http\Response
     */
    public function show(Pasta $pasta)
    {

        return view('pastas/show', compact('pasta'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasta  $pasta
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasta $pasta)
    {
        return view('pastas/edit', compact('pasta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasta  $pasta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasta $pasta)
    {
        // prendo come sempre i parametri dei campi di input dal form
        $formData = $request->all();

        // sintassi per modificare un oggetto del model del database
        $pasta->update($formData);

        // effettivamente è questo comando che salva le modifiche nel db
        $pasta->save();

        // poi faccio il redirect alla show della pasta appena modificata
        return redirect()->route('pastas.show', $pasta->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasta  $pasta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasta $pasta)
    {
        
        // questo metodo ELIMINA PERMANENTEMENTE il dato dal database
        // :(
        $pasta->delete();

        return redirect()->route('pastas.index');
        
    }


}
