@props(['idea'])

<div class="bg-white border border-slate-200 rounded-xl p-5 flex flex-col gap-3 hover:border-slate-300 transition">

    <div class="flex items-center justify-between">
        <span class="text-xs font-medium px-2.5 py-1 rounded-full
            {{ $idea->status === \App\Enums\IdeaStatus::PENDING ? 'bg-yellow-50 text-yellow-600' : '' }}
            {{ $idea->status === \App\Enums\IdeaStatus::IN_PROGRESS ? 'bg-blue-50 text-blue-600' : '' }}
            {{ $idea->status === \App\Enums\IdeaStatus::COMPLETED ? 'bg-green-50 text-green-600' : '' }}
            {{ $idea->status === \App\Enums\IdeaStatus::CANCELLED ? 'bg-red-50 text-red-600' : '' }}
        ">
            {{ $idea->status->label() }}
        </span>
        <span class="text-xs text-slate-400">{{ $idea->created_at->diffForHumans() }}</span>
    </div>

    <div>
        <a href="/ideas/{{ $idea->id }}">
            <h2 class="font-medium text-slate-800 leading-snug">{{ $idea->title }}</h2>
        </a>
        <p class="text-sm text-slate-500 mt-1 line-clamp-2">{{ $idea->description }}</p>
    </div>

    @if ($idea->links->count())
        <div class="flex flex-wrap gap-1">
            @foreach ($idea->links as $link)
                <a href="{{ $link }}" target="_blank"
                   class="text-xs text-blue-500 hover:underline truncate max-w-[150px]">
                    {{ $link }}
                </a>
            @endforeach
        </div>
    @endif

    <div class="flex gap-2 pt-2 border-t border-slate-100">
        <a href="/ideas/{{ $idea->id }}" class="btn-ghost btn-sm flex-1 text-center">View</a>
        <a href="/ideas/{{ $idea->id }}/edit" class="btn-ghost btn-sm flex-1 text-center">Edit</a>
        <form action="/ideas/{{ $idea->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
                    onclick="return confirm('Delete this idea?')"
                    class="btn-ghost btn-sm text-red-500 hover:text-red-600">
                Delete
            </button>
        </form>
    </div>
</div>