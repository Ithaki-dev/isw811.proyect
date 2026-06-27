<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use App\Http\Requests\StoreIdeaRequest;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ideas = Idea::query()
            ->where('user_id', auth()->id())
            ->get();

        return view('ideas.index', [
            'ideas' => $ideas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ideas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $attributes = $request->validate([
        'idea' => 'required|string|max:255',
    ]);

    $attributes['user_id'] = auth()->id();
    $attributes['state'] = 'pending';

    Idea::create($attributes);

    return redirect('/ideas');
    }
    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        return view('ideas.show', [
            'idea' => $idea,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        return view('ideas.edit', [
            'idea' => $idea,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Idea $idea)
    {
        $attributes = $request->validate([
            'idea' => 'required',
        ]);

        $idea->update($attributes);

        return redirect('/ideas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        $idea->delete();

        return redirect('/ideas');
    }
}
