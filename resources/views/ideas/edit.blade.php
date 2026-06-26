
<x-layout>
	<form method="POST" action="/ideas/{{ $idea->id }}">
		@csrf
		@method('PATCH')
		<div>
			<label for="idea">Edit your idea</label>
			<br>
			<textarea id="idea" name="idea" rows="5">"{{ $idea->idea }}"</textarea>
		</div>

		<button type="submit">Submit</button>
	</form>
	<form method="POST" action="/ideas/{{ $idea->id }}">
			@csrf
			@method('DELETE')
			<button type="submit" onclick="return confirm('Are you sure you want to delete this idea?')">Delete</button>
	</form>
</x-layout>