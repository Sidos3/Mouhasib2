<?php
namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'compte_debit' => 'required|string',
            'compte_credit' => 'required|string',
            'emplois' => 'required|string',
            'date' => 'required|date',
            'ressources' => 'required|string',
            'montant_debit' => 'required|numeric',
            'montant_credit' => 'required|numeric',
        ]);

        Journal::create($validated);

        return redirect()->back()->with('success', 'Journal entry added successfully.');
    }
    public function edit(Journal $journal)
    {
        return view('edit-journal', compact('journal'));
    }
    
    public function update(Request $request, Journal $journal)
    {
        $validated = $request->validate([
            'compte_debit' => 'required|string',
            'compte_credit' => 'required|string',
            'emplois' => 'required|string',
            'date' => 'required|date',
            'ressources' => 'required|string',
            'montant_debit' => 'required|numeric',
            'montant_credit' => 'required|numeric',
        ]);

        $journal->update($validated);

        return redirect()->back()->with('success', 'Journal entry updated successfully.');
    }

    public function destroy(Journal $journal)
    {
        $journal->delete();

        return redirect()->back()->with('success', 'Journal entry deleted successfully.');
    }
}
