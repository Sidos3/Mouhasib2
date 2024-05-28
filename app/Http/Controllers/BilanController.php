<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bilan;

class BilanController extends Controller
{
    public function create_bilan(Request $request)
    {
        $request->validate([
            'total_immobilisation' => 'required',
            'details_immobilisation' => 'required',
            'total_actif_a_court_terme' => 'required',
            'details_total_actif_a_court_terme' => 'required',
            'total_du_capital' => 'required',
            'details_du_capital' => 'required',
            'total_du_passif_court_terme' => 'required',
            'details_du_passif_court_terme' => 'required'
        ]);
        Bilan::create([
            'total_immobilisation' => $request->total_immobilisation,
            'details_immobilisation' => $request->details_immobilisation,
            'total_actif_a_court_terme' => $request->total_actif_a_court_terme,
            'details_total_actif_a_court_terme' => $request->details_total_actif_a_court_terme,
            'total_du_capital' => $request->total_du_capital,
            'details_du_capital' => $request->details_du_capital,
            'total_du_passif_court_terme' => $request->total_du_passif_court_terme,
            'details_du_passif_court_terme' => $request->details_du_passif_court_terme
        ]);
        return response('create');
    }
}
