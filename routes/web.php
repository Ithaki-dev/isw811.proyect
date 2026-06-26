<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $ideas = session('ideas', []);
    return view('ideas', [
        'ideas' => $ideas,
    ]);
});

Route::post('/ideas', function () {
    // Handle the form submission here

    $idea = request('idea');

    session()->push('ideas', $idea);

    return redirect('/');
});

Route::get('delete-ideas', function () {
    session()->forget('ideas');
    return redirect('/');
});