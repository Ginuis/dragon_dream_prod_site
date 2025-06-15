@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <div class="text-center mt-5">
        <h1 class="display-4">Bienvenue sur Dragon Dream</h1>
        <p class="lead">Un monde de créativité et de projets inspirants</p>
        <a href="/inscription" class="btn btn-outline-light mt-3">Rejoindre le mouvement</a>
    </div>
    @for ($i = 0; $i < 30; $i++)
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. {{ $i }}</p>
    @endfor
@endsection