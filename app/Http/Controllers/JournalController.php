<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index()
    {
        $journals = Journal::all();
        return view('comptable.dashboard', compact('journals'));
    }

    public function create()
    {
        // Pass an empty Journal instance to the view for the form
        $journal = new Journal();
        return view('comptable.create', compact('journal')); // Use 'create' view for form
    }

    public function store(Request $request)
    {
        // Data validation
        $validatedData = $request->validate([
            'debitAccount' => 'required',
            'creditAccount' => 'required',
            'emplois' => 'required',
            'date' => 'required|date',
            'ressources' => 'required',
            'debitAmount' => 'required|numeric',
            'creditAmount' => 'required|numeric',
        ], [
            // Custom validation messages
            'debitAccount.required' => 'The debit account is required.',
            'creditAccount.required' => 'The credit account is required.',
            // Add more custom messages for other fields if needed
        ]);

        // Create a new journal entry
        $journal = new Journal();
        $journal->compte_debit = $validatedData['debitAccount'];
        $journal->compte_credit = $validatedData['creditAccount'];
        $journal->emplois = $validatedData['emplois'];
        $journal->date = $validatedData['date'];
        $journal->ressources = $validatedData['ressources'];
        $journal->montant_debit = $validatedData['debitAmount'];
        $journal->montant_credit = $validatedData['creditAmount'];
        $journal->save();

        // Return response based on request type
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Journal entry added successfully'], 200);
        } else {
            return redirect()->route('comptable.dashboard')->with('success', 'Journal entry added successfully');
        }
    }

    public function show(Journal $journal)
    {
        return view('journals.show', compact('journal'));
    }

    public function edit(Journal $journal)
    {
        return view('journals.edit', compact('journal'));
    }

    public function update(Request $request, Journal $journal)
    {
        $validated = $request->validate([
            'compte_debit' => 'required|string|max:255',
            'compte_credit' => 'required|string|max:255',
            'emplois' => 'required|string|max:255',
            'date' => 'required|date',
            'ressources' => 'required|string|max:255',
            'montant_debit' => 'required|numeric',
            'montant_credit' => 'required|numeric',
        ]);

        $journal->update($validated);

        return redirect()->route('comptable.dashboard');
    }

    public function destroy(Journal $journal)
    {
        $journal->delete();
        return redirect()->route('comptable.dashboard');
    }
}
