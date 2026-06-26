<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Route;

use App\Models\Idea;


Route::get('/', function () {
    //$ideas = session('ideas', []);

    $ideas = Idea::query()
        ->when(request('state'), function ($query, $state) {
            $query->where('state', $state);
        })
        ->get();
        

    //dd($ideas);

    return view('ideas', [
        'ideas' => $ideas,
    ]);
});

Route::post('/ideas', function () {
    // Handle the form submission here

    $idea = request('idea');

    Idea::create([
        'idea' => $idea,
        'state'=> 'pending',
    ]);

    return redirect('/');
});

Route::get('delete-ideas', function () {
    Idea::truncate();
    return redirect('/');
});