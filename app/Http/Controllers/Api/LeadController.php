<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{

    //essendo una rotta in POST utilizzo request
    public function store(Request $request)
    {
        //prendo i dati da validare
        $data = $request->all();
        // creo un'istanza di validator utilizzo il validator con il metodo per fare la validazione make, gli passo l'oggetto da validare come secondo parametro gli passo i ruoli della validazione
        //      ------ VALIDAZIONE -------
        $validator = Validator::make(
            $data,
            [
                'name' => 'required|min:3|max:100',
                'email' => 'required|email',
                'message' => 'required|min:3',

            ],
            [
                'name.required' => 'Il nome è un campo obbligatorio',
                'name.min' => 'Il nome deve avere almeno :min caratteri',
                'name.max' => 'Il nome non può contenere più di :max caratteri',
                'email.required' => 'L\' email è un campo obbligatorio',
                'email.email' => 'Formato email non corretto',
                'message.required' => 'Il messaggio è un campo obbligatorio',
                'message.min' => 'Il messaggio deve avere almeno :min caratteri',
            ]
        );

        // il metodo fails mi restituisce tue/false se fallisce o meno la validazione
        if ($validator->fails()) {
            $success = false;
            // con errors ottengo tutti gli errori
            $errors = $validator->errors();
            return response()->json(compact('success', 'errors'));
        };

        // salvo l'email nel db

        // invio l'email

        //restituisco il jsoncon l'avvenuto invio

        $success = true;
        return response()->json(compact('success'));
    }
}
