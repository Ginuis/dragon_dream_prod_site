<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InscriptionsExport;

class RegisterController extends Controller
{
    // Affiche le formulaire
    public function create() {
        return view('register');
    }

    // Enregistre les données en base
    public function store(Request $request) {
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|email|unique:inscriptions,email',
            'telephone' => 'required|string|max:20',
            'ville' => 'required|string|max:100',
        ]);

        DB::table('inscriptions')->insert([
            ...$validated,
            'created_at' => now(),
        ]);

        return redirect('/')->with('success', 'Inscription enregistrée avec succès !');
    }

    // Exporte les données en Excel
    public function export() {
        return Excel::download(new InscriptionsExport, 'inscriptions.xlsx');
    }
}