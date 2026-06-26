<x-layout>
	<form method="POST" action="/ideas">
		@csrf
		<div>
			<label for="idea">New idea</label>
			<br>
			<textarea id="idea" name="idea" rows="5"></textarea>
		</div>

		<button type="submit">Submit</button>
	</form>

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
	@endif	
</x-layout>