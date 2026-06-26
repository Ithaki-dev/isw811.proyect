<x-layout>
	<h1 class="text-2xl font-bold">Ideas</h1>

	<a href="/ideas/create" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Add New Idea</a>
	@if ($ideas->isEmpty())
		<p class="mt-6">No ideas yet.</p>
	@else
		<ul class="mt-6 space-y-4">
			@foreach ($ideas as $idea)
                <li class="border border-gray-300 rounded-lg p-4 flex items-center justify-between">
					{{ $idea->idea }}
                    <a href="/ideas/{{ $idea->id }}/edit" class="ml-2 bg-blue-500 text-white px-2 py-1 rounded">Edit</a>
				</li>
			@endforeach
		</ul>
		<div class="mt-6">
			<button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="window.location.href='/create'">Add New Idea</button>
		</div>
	@endif	
</x-layout>