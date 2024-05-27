<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class CompanyController extends Controller
{

    public function create()
    {
        return view('company.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'total_immobilisee' => 'required|numeric',
            'details_immobilisee' => 'required|string',
            'total_circulants' => 'required|numeric',
            'details_circulants' => 'required|string',
            'capital_propre' => 'required|numeric',
            'details_propre' => 'required|string',
            'total_passifs' => 'required|numeric',
            'details_passifs' => 'required|string',
        ]);

        // Check if user is authenticated
        if (Auth::check()) {
            // Create the company record
            Company::create([
                'user_id' => Auth::id(),
                'total_immobilisee' => $request->total_immobilisee,
                'details_immobilisee' => $request->details_immobilisee,
                'total_circulants' => $request->total_circulants,
                'details_circulants' => $request->details_circulants,
                'capital_propre' => $request->capital_propre,
                'details_propre' => $request->details_propre,
                'total_passifs' => $request->total_passifs,
                'details_passifs' => $request->details_passifs,
            ]);

            // Update the user's role to admin
            $user = Auth::user();
            $user->role = 'admin';
            // $user->save();  // Ensure save is called on $user

            // Redirect to admin dashboard
            return redirect()->route('admin.dashboard')->with('success', 'Company registered successfully and you are now an admin.');
        } else {
            // Handle the case when the user is not authenticated
            return redirect()->route('login')->with('error', 'You must be logged in to register a company.');
        }
    }
}
