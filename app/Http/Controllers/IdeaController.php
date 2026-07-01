<?php

namespace App\Http\Controllers;

use App\Enums\IdeaStatus;
use App\Http\Requests\StoreIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IdeaController extends Controller
{
    public function index()
    {
        $ideas = Auth::user()->ideas()
            ->when(request('status'), function ($query) {
                $query->where('status', request('status'));
            })
            ->latest()
            ->get();

        $ideasCount = Auth::user()->ideas()
            ->select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status');

        $statusCounts = collect(IdeaStatus::cases())
            ->mapWithKeys(fn($status) => [$status->value => $ideasCount->get($status->value, 0)])
            ->put('all', $ideasCount->sum());

        return view('components.idea.index', compact('ideas', 'statusCounts'));
    }

    public function create()
    {
        return view('components.idea.create');
    }

    public function store(StoreIdeaRequest $request)
    {
        $validated = $request->validated();

        $idea = new Idea();
        $idea->title = $validated['title'];
        $idea->description = $validated['description'];
        $idea->links = collect(explode("\n", $validated['links'] ?? ''))
            ->map(fn($link) => trim($link))
            ->filter()
            ->values()
            ->toArray();
        $idea->status = IdeaStatus::PENDING;
        $idea->user_id = Auth::id();
        $idea->save();

        return redirect()->route('ideas.index')->with('success', 'Idea created successfully');
    }

    public function show(Idea $idea)
    {
        return view('components.idea.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {
        $this->authorize('update', $idea);
        return view('components.idea.edit', compact('idea'));
    }

    public function update(UpdateIdeaRequest $request, Idea $idea)
    {
        $this->authorize('update', $idea);

        $validated = $request->validated();

        $idea->title = $validated['title'];
        $idea->description = $validated['description'];
        $idea->links = $validated['links'] ?? [];
        $idea->status = $validated['status'];
        $idea->save();

        return redirect()->route('ideas.show', $idea)->with('success', 'Idea updated successfully');
    }

    public function destroy(Idea $idea)
    {
        $this->authorize('delete', $idea);
        $idea->delete();
        return redirect()->route('ideas.index')->with('success', 'Idea deleted successfully');
    }
}