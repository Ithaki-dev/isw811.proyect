
<x-layout>
    @if ($idea)
        <div class="border border-gray-300 rounded-lg p-4">
            {{ $idea->idea }}
        </div>
    @else
        <p class="mt-6">Idea not found.</p>
    @endif
</x-layout>