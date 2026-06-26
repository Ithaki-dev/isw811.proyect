
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
	<div class="mt-6 border-t border-gray-200 pt-6">
		<ul>
			@foreach ($ideas as $idea)
				<li>{{ $idea }}</li>
			@endforeach
		</ul>
	</div>


	<form method="GET" action="delete-ideas">
		@csrf
		<button type="submit">Delete all ideas</button>
	</form>

</x-layout>