<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Product;
use Illuminate\Http\Request;

class ComptableController extends Controller
{
    public function index()
    {
        // If you need journals data in the index method, fetch it here
        $journals = Journal::all();
        $products=Product::all();
        // Pass the $journals data to the view
        return view('comptable.dashboard', ['journals' => $journals,'products'=>$products]);
    }

    public function journal()
    {
        // Fetch journals data
        $journals = Journal::all();

        // Pass the $journals data to the view
        return view('comptable.dashboard', ['journals' => $journals]);
    }
}
