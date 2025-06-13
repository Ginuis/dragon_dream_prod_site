@extends('layouts.app')
@section('title', 'Galerie')
@section('content')
    <h1>Galerie d’images</h1>
    <div class="row">
        @foreach($images as $image)
            <div class="col-md-3 mb-3">
                <img src="{{ Storage::url($image) }}" class="img-fluid">
            </div>
        @endforeach
    </div>

    <h2 class="mt-5">Vidéos YouTube</h2>
    <div class="ratio ratio-16x9">
        <iframe src="https://www.youtube.com/embed/ID_VIDEO" allowfullscreen></iframe>
    </div>
@endsection