<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bilan;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class BilanController extends Controller
{
    public function create_bilan(Request $request)
    {
        $request->validate([
            'admin_name' => 'required',
            'admin_email' => 'required|email',
            'admin_phone' => 'required',
            'company_name' => 'required',
            'company_address' => 'required',
            'company_registration' => 'required',
            'total_immobilisation' => 'required',
            'details_immobilisation' => 'required',
            'total_actif_a_court_terme' => 'required',
            'details_total_actif_a_court_terme' => 'required',
            'total_du_capital' => 'required',
            'details_du_capital' => 'required',
            'total_du_passif_court_terme' => 'required',
            'details_du_passif_court_terme' => 'required'
        ]);

        /** @var User $user */
        $user = Auth::user();

        $bilan = Bilan::create([
            'user_id' => $user->id,
            'admin_name' => $request->admin_name,
            'admin_email' => $request->admin_email,
            'admin_phone' => $request->admin_phone,
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'company_registration' => $request->company_registration,
            'total_immobilisation' => $request->total_immobilisation,
            'details_immobilisation' => $request->details_immobilisation,
            'total_actif_a_court_terme' => $request->total_actif_a_court_terme,
            'details_total_actif_a_court_terme' => $request->details_total_actif_a_court_terme,
            'total_du_capital' => $request->total_du_capital,
            'details_du_capital' => $request->details_du_capital,
            'total_du_passif_court_terme' => $request->total_du_passif_court_terme,
            'details_du_passif_court_terme' => $request->details_du_passif_court_terme
        ]);
        // Update the user's role to "admin"
        $user->update(['role' => 'admin']);

        // Log out the user
        Auth::logout();

        // Redirect to the login page or any other page
        return redirect('/login')->with('status', 'Bilan created successfully. You have been logged out.');
    }
}
