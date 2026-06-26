<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Route;

use App\Models\Idea;

//Get all ideas
Route::get('/ideas', function () {
    //$ideas = session('ideas', []);

    $ideas = Idea::all();

    //dd($ideas);

    return view('ideas.index', [
        'ideas' => $ideas,
    ]);
});

//Get a single idea
Route::get('/ideas/{idea}', function (Idea $idea) {
    return view('ideas.show', [
        'idea' => $idea,
    ]);
});


//Edit an idea by id
Route::get('/ideas/{idea}/edit', function (Idea $idea) {
    return view('ideas.edit', [
        'idea' => $idea,
    ]);
});


//Update an idea by id
Route::patch('/ideas/{idea}', function (Idea $idea) {
    $idea->update([
        'idea' => request('idea'),
    ]);

    return redirect('/ideas');
});


//Create a new idea
Route::post('/ideas', function () {
    $attributes = request()->validate([
        'idea' => 'required',
    ]);

    Idea::create($attributes);

    return redirect('/ideas');
});

//Delete an idea by id
Route::delete('/ideas/{idea}', function (Idea $idea) {
    $idea->delete();

    return redirect('/ideas');
});