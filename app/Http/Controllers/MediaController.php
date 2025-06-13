<?php

class MediaController extends Controller {
    public function index() {
        $images = Storage::files('public/gallery');
        return view('gallery', compact('images'));
    }
}
