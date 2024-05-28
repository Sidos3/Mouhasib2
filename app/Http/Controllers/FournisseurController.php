<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fournisseur;

class FournisseurController extends Controller
{
    public function index()
    {
        return view('fournisseur.dashboard');
    }
    public function create(Request $request)
    {
        // Validate the incoming request data
        $request->validate([

            'full_name' => 'required',
            'NNI' => 'required',
            'cle_de_paye' => 'required',
            'numero_telephone' => 'required',
            'company_name' => 'required',
            'date_naissance' => 'required',
            'ville' => 'required',
            'adresse' => 'required',
        ]);

        // Create the Fournisseur record
        Fournisseur::create([
            // 'user_id' => $request->user_id,
            'full_name' => $request->full_name,
            'NNI' => $request->NNI,
            'cle_de_paye' => $request->cle_de_paye,
            'numero_telephone' => $request->numero_telephone,
            'company_name' => $request->company_name,
            'date_naissance' => $request->date_naissance,
            'ville' => $request->ville,
            'adresse' => $request->adresse
        ]);

        // Return a success response
        return response('cree');
    }
}
