<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SessionController extends Controller
{

    /**
     * Show the login form.
     */
    public function create()
    {
        return view('ideas.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (!auth()->attempt($attributes)) {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }

        return redirect('/ideas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        auth()->logout();

        return redirect('/ideas');
    }
}
