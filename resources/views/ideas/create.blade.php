<x-layout title="Add new idea">
    <div style="min-height: 80vh; display: flex; align-items: center; justify-content: center;">
        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-8 w-full max-w-sm shadow-sm">
            <legend class="fieldset-legend text-lg font-medium">Add new idea</legend>

            @if ($errors->any())
                <div class="alert alert-error mb-4 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="/ideas" method="POST">
                @csrf

                <label class="label" for="idea">Idea</label>
                <input type="text" name="idea" id="idea"
                       class="input w-full mb-6 @error('idea') input-error @enderror"
                       value="{{ old('idea') }}"
                       placeholder="My awesome idea..." required>

                <div class="join w-full">
                    <button type="submit" class="btn btn-primary join-item flex-1">
                        Save idea
                    </button>
                    <a href="/ideas" class="btn btn-ghost join-item">
                        Cancel
                    </a>
                </div>
            </form>
        </fieldset>
    </div>
</x-layout>