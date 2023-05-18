<?php

namespace App\Http\Controllers;

use App\Models\Pasta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        
        $this->validation($request);

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
        $this->validation($request);

        // prendo come sempre i parametri dei campi di input dal form
        $formData = $request->all();

        // sintassi per modificare un oggetto del model del database
        $pasta->update($formData);

        // questo è opzionale
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


    // creo una funzione che utilizzerò solo per validare
    private function validation($request) {
        // controlla che i parametri del form rispettino le regole che indichiamo
        // $request->validate([
        //     'title' => 'required|max:50|min:5',
        //     'src' => 'required|max:255',
        //     'type' => 'required|max:200',
        //     'cooking_time' => 'nullable|max:10',
        //     'weight' => 'required|max:10',
        //     'description' => 'required|min:10',
        // ]);
        // in caso NON le rispettino (ne basta una), fa tornare l'utente
        // alla rotta precedente, passandogli un array di errori chiamato $errors
        

        
        // dobbiamo prendere solo i parametri del form, utilizziamo quindi il metodo all()
        $formData = $request->all(); 
        
        // l'import da fare qui è del Validator (ce ne sono tanti) con questo percorso:
        // Illuminate\Support\Facades\Validator;
        // passiamo i parametri del form al metodo statico  make() di Validation
        $validator = Validator::make($formData, [
            // qui ci dobbiamo inserire un array di regole (quelle che abbiamo usato sino a prima)
            'title' => 'required|max:50|min:5',
            'src' => 'required|max:255',
            'type' => 'required|max:200',
            'cooking_time' => 'nullable|max:10',
            'weight' => 'required|max:10',
            'description' => 'required|min:10',
        ], [
            // dobbiamo inserire qui un insieme di messaggi da comunicare all'utente per ogni errore che vogliamo modificare
            'title.required' => 'Guarda fratello, il titolo lo devi inserire.',
            'title.max' => 'Il titolo non deve essere più lungo di 50 caratteri',
            'title.min' => 'Il titolo non deve essere più corto di 5 caratteri',
            'src.required' => "Il link dell'immagine deve essere indicato",
            'src.max' => "Il link dell'immagine non deve essere più lungo di 255 caratteri",
        ])->validate();

        // importante, visto che siamo in una funzione, dobbiamo restituire un valore, il validator gestisce questo campo e in caso trovasse un errore farebbe
        // in automatico il redirect
        return $validator;
    }

}
