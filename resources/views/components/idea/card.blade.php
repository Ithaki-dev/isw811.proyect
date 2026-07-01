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

    @if ($idea->links && $idea->links->count())
        <div class="flex flex-wrap gap-1">
            @foreach ($idea->links as $link)
                <a href="{{ $link }}" target="_blank"
                   class="text-xs text-blue-500 hover:underline truncate max-w-[150px]">
                    {{ $link }}
                </a>
            @endforeach
        </div>
    @endif

</div>