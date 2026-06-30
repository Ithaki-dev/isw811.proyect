<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;
use App\Enums\IdeaStatus;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las ideas
        $ideas = Auth::user()->ideas()->when(request('status'), function ($query) {
            $query->where('status', request('status'));
        })->get();

        // select status, count(*) from Ideas group by status
        $ideasCount = Auth::user()->ideas()
            ->select('status', \DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status');

        // Todos los estatus
        $statusCounts = collect(IdeaStatus::cases())
            ->mapWithKeys(fn($status) => [$status->value => $ideasCount->get($status->value, 0)])
            ->put('all', $ideasCount->sum());

        // Vista de ideas
        return view('components.idea.index', compact('ideas', 'statusCounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIdeaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        $idea = Idea::findOrFail($idea->id);
        return view('components.idea.show', compact('idea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIdeaRequest $request, Idea $idea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        // si no es el dueño de la idea, no se puede eliminar
        if ($idea->user_id != Auth::id()) {
            abort(403);
        }
        $idea->delete();
        return redirect()->route('ideas.index')->with('success', 'Idea deleted successfully');
    }
}
