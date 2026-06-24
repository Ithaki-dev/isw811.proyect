<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::view('/about', 'about');

// Route::view('/contact', 'contact');

Route::get('/', function () {
    return view('welcome', [
        'greeting' => 'Hello World',
        'name' => request('person', 'Guest'),
    ]);
});