<x-layout title="Ideas">
    <div style="max-width: 900px; margin: 0 auto; padding: 2.5rem 1.5rem;">

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
            <h1 class="text-3xl font-medium">Ideas</h1>
            <a href="/ideas/create" class="btn btn-primary btn-sm">
                + Add new idea
            </a>
        </div>

        @if ($ideas->isEmpty())
            <div class="card bg-base-100 border border-base-300 text-center py-20">
                <div class="card-body items-center">
                    <p class="text-base-content/50 text-lg mb-4">No ideas yet.</p>
                    <a href="/ideas/create" class="btn btn-primary">
                        + Add new idea
                    </a>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($ideas as $idea)
                    <div class="card bg-base-100 border border-base-300 hover:border-base-content/30 transition-colors">
                        <div class="card-body gap-3">
                            @if($idea->state === 'open')
                                <span class="badge badge-success badge-sm w-fit">Open</span>
                            @elseif($idea->state === 'review')
                                <span class="badge badge-warning badge-sm w-fit">In review</span>
                            @else
                                <span class="badge badge-error badge-sm w-fit">Closed</span>
                            @endif

                            <h2 class="font-medium text-base leading-snug">{{ $idea->idea }}</h2>

                            <p class="text-xs text-base-content/50">
                                {{ $idea->created_at->format('M d, Y') }}
                            </p>

                            <div class="card-actions border-t border-base-300 pt-3 mt-1">
                                <a href="/ideas/{{ $idea->id }}/edit" class="btn btn-ghost btn-xs flex-1">Edit</a>
                                <form action="/ideas/{{ $idea->id }}" method="POST" class="flex-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Delete this idea?')"
                                            class="btn btn-ghost btn-xs text-error w-full">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>