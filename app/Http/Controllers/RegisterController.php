<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller {
    public function create() {
        return view('register');
    }

    public function store(Request $request) {
        $data = $request->only(['nom', 'email', 'section']);
        $csvLine = implode(',', $data) . "\n";
        Storage::append('inscriptions.csv', $csvLine);
        return redirect('/')->with('success', 'Inscription réussie !');
    }
}