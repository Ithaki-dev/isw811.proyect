<x-layout>
	<h1 class="text-2xl font-bold">Add New Idea</h1>

	<form action="/ideas" method="POST" class="mt-4">
		@csrf
		<div>
			<label for="idea" class="block text-sm font-medium text-gray-700">Idea</label>
			<input type="text" name="idea" id="idea" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
		</div>
		<button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
	</form>
</x-layout>