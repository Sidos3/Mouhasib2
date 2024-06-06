<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fournisseur;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
        $user = Auth::user();

        // Create the Fournisseur record and associate it with the user
        Fournisseur::create([
            'user_id' => $user->id,
            'full_name' => $request->full_name,
            'NNI' => $request->NNI,
            'cle_de_paye' => $request->cle_de_paye,
            'numero_telephone' => $request->numero_telephone,
            'company_name' => $request->company_name,
            'date_naissance' => $request->date_naissance,
            'ville' => $request->ville,
            'adresse' => $request->adresse
        ]);
        // Update the user's role to "fournisseur"
        $user = Auth::user();
        // Assuming $user is the authenticated user
        $user = User::find($user->id);
        $user->update(['role' => 'fournisseur']);

        // Return a success response
        return response('Fournisseur created successfully');
    }
}
