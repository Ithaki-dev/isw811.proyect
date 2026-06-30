@props(['idea'])

<x-layout :title="$idea->title">
    <div class="max-w-3xl mx-auto">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">
            <a href="/ideas" class="text-sm text-slate-400 hover:text-slate-600 transition">
                ← Back to ideas
            </a>
            <span class="text-xs font-medium px-2.5 py-1 rounded-full
                {{ $idea->status === \App\Enums\IdeaStatus::PENDING ? 'bg-yellow-50 text-yellow-600' : '' }}
                {{ $idea->status === \App\Enums\IdeaStatus::IN_PROGRESS ? 'bg-blue-50 text-blue-600' : '' }}
                {{ $idea->status === \App\Enums\IdeaStatus::COMPLETED ? 'bg-green-50 text-green-600' : '' }}
                {{ $idea->status === \App\Enums\IdeaStatus::CANCELLED ? 'bg-red-50 text-red-600' : '' }}
            ">
                {{ $idea->status->label() }}
            </span>
        </div>

        {{-- Main card --}}
        <div class="bg-white border border-slate-200 rounded-xl p-8 flex flex-col gap-6">

            <div>
                <h1 class="text-2xl font-semibold text-slate-800">{{ $idea->title }}</h1>
                <p class="text-sm text-slate-400 mt-1">
                    By {{ $idea->user->name }} · {{ $idea->created_at->diffForHumans() }}
                </p>
            </div>

            <p class="text-slate-600 leading-relaxed">{{ $idea->description }}</p>

            {{-- Links --}}
            @if ($idea->links->count())
                <div>
                    <h3 class="text-sm font-medium text-slate-700 mb-2">Links</h3>
                    <div class="flex flex-col gap-1">
                        @foreach ($idea->links as $link)
                            <a href="{{ $link }}" target="_blank"
                               class="text-sm text-blue-500 hover:underline truncate">
                                {{ $link }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Steps --}}
            @if ($idea->steps->count())
                <div>
                    <h3 class="text-sm font-medium text-slate-700 mb-3">Steps</h3>
                    <ul class="flex flex-col gap-2">
                        @foreach ($idea->steps as $step)
                            <li class="flex items-center gap-3 text-sm {{ $step->completed ? 'line-through text-slate-400' : 'text-slate-600' }}">
                                <span class="w-4 h-4 rounded-full border-2 flex-shrink-0
                                    {{ $step->completed ? 'bg-green-500 border-green-500' : 'border-slate-300' }}">
                                </span>
                                {{ $step->description }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Actions --}}
            <div class="flex gap-3 pt-4 border-t border-slate-100">
                <a href="/ideas/{{ $idea->id }}/edit" class="btn-outline">Edit</a>
                <form action="/ideas/{{ $idea->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            onclick="return confirm('Delete this idea?')"
                            class="btn-danger">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layout>