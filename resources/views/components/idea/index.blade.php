<x-layout title="Ideas">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-2xl font-semibold text-slate-800">Ideas</h1>
        <a href="/ideas/create" class="btn-primary">+ New idea</a>
    </div>
    <!-- Filter for ideas -->
    <!--add the count to the button-->
    <div class="flex gap-2 mb-6">
        @foreach ($statusCounts as $status => $count)
            <a href="/ideas?status={{ $status }}"
                class="btn {{ request('status') == $status ? 'btn-primary' : 'btn-outline' }}">{{ ucfirst($status) }} {{ $count }}</a>
        @endforeach
    </div>

    @if ($ideas->isEmpty())
        <div class="bg-white border border-slate-200 rounded-xl p-16 text-center">
            <p class="text-slate-400 text-lg mb-4">No ideas yet.</p>
            <a href="/ideas/create" class="btn-outline">Create your first idea</a>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($ideas as $idea)
                <x-idea.card :idea="$idea" />
            @endforeach
        </div>
    @endif
</x-layout>