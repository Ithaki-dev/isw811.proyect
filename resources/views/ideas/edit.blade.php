
<x-layout>
	<h1 class="text-2xl font-bold">Edit Idea</h1>
	<form action="/ideas/{{ $idea->id }}" method="POST" class="mt-4">
		@csrf
		@method('PATCH')
		<div class="mb-4">
			<label for="idea" class="block text-gray-700 font-bold mb-2">Idea:</label>
			<input type="text" name="idea" id="idea" value="{{ $idea ->idea }}" class="border border-gray-300 rounded-lg p-2 w-full" required>
		</div>
		<button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Idea</button>
	</form>
</x-layout>