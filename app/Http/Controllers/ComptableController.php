<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComptableController extends Controller
{
    public function index()
    {
        return view('comptable.dashboard');
    }
}
