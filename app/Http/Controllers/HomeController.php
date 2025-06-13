<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index() {
        return view('home');
    }

    public function about() {
        return view('about');
    }
}