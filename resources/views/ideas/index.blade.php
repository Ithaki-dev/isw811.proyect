<x-layout>
	<h1 class="text-2xl font-bold">Ideas</h1>

	@if ($ideas->isEmpty())
		<p class="mt-6">No ideas yet.</p>
	@else
		<ul class="mt-6 space-y-4">
			@foreach ($ideas as $idea)
				<li class="border border-gray-300 rounded-lg p-4">
					<div class="flex justify-between items-center">
						<span>{{ $idea->idea }}</span>
						<div class="space-x-2">
							<a href="/ideas/{{ $idea->id }}/edit" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
							<form action="/ideas/{{ $idea->id }}" method="POST" class="inline">
								@csrf
								@method('DELETE')
								<button type="submit" onclick="return confirm('Are you sure you want to delete this idea?')" class="bg-red-500
								 text-white px-3 py-1 rounded">Delete</button>
							</form>
						</div>
					</div>
				</li>
			@endforeach
		</ul>
		<div class="mt-6">
			<button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="window.location.href='/create'">Add New Idea</button>
		</div>
	@endif	
</x-layout>