@extends('layouts.app')
@section('title', 'Inscription')
@section('content')
    <h1>Formulaire d'inscription</h1>
    <form method="POST" action="{{ url('/inscription') }}">
        @csrf
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Section</label>
            <input type="text" name="section" class="form-control" required>
        </div>
        <button class="btn btn-primary">S'inscrire</button>
    </form>
@endsection