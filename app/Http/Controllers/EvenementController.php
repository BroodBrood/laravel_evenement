<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    /**
     * Display a listing of the evenementen.
     */
    public function index()
    {
        $evenementen = Evenement::with('evenementType')
            ->orderBy('datum', 'asc')
            ->get();

        return view('evenementen.index', compact('evenementen'));
    }

    /**
     * Display the specified evenement.
     */
    public function show(Evenement $evenement)
    {
        $evenement->load('evenementType');
        
        return view('evenementen.show', compact('evenement'));
    }
}
