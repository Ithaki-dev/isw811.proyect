<x-layout>
	<h1 class="text-2xl font-bold">Add New Idea</h1>
	<form action="/ideas" method="POST" class="mt-4">
		@csrf
		@method('POST')
		<div class="mb-4">
			<label for="idea" class="block text-gray-700 font-bold mb-2">Idea:</label>
			<input type="text" name="idea" id="idea" class="border border-gray-300 rounded-lg p-2 w-full" required>
		</div>
		<button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Idea</button>
	</form>
</x-layout>