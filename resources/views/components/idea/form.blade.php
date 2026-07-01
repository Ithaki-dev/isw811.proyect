@props(['idea' => null])

@php
    $isEditing = $idea !== null;
    $action = $isEditing ? "/ideas/{$idea->id}" : '/ideas';
@endphp

<form action="{{ $action }}" method="POST" class="flex flex-col gap-4">
    @csrf
    @if ($isEditing)
        @method('PATCH')
    @endif

    <div class="form-group">
        <label class="form-label" for="title">Title</label>
        <input type="text" name="title" id="title"
               class="{{ $errors->has('title') ? 'form-input-error' : 'form-input' }}"
               value="{{ old('title', $idea?->title) }}"
               placeholder="My awesome idea" required>
    </div>

    <div class="form-group">
        <label class="form-label" for="description">Description</label>
        <textarea name="description" id="description" rows="4"
                  class="{{ $errors->has('description') ? 'form-input-error' : 'form-input' }}"
                  placeholder="Describe your idea...">{{ old('description', $idea?->description) }}</textarea>
    </div>

    <div class="form-group">
    <label class="form-label" for="status">Status</label>
    <select name="status" id="status" class="form-input">
        @foreach (\App\Enums\IdeaStatus::cases() as $status)
            <option value="{{ $status->value }}"
                {{ old('status', $idea?->status->value) === $status->value ? 'selected' : '' }}>
                {{ $status->label() }}
            </option>
        @endforeach
    </select>
    </div>

    <div class="form-group">
        <label class="form-label" for="links">
            Links <span class="text-slate-400 font-normal">(optional, one per line)</span>
        </label>
        <textarea name="links" id="links" rows="2"
                  class="form-input"
                  placeholder="https://example.com">{{ old('links', $idea && $idea->links ? implode("\n", $idea->links->toArray()) : '') }}</textarea>

    </div>

    <div class="flex gap-3 pt-2">
        <button type="submit" class="btn-primary flex-1">
            {{ $isEditing ? 'Update idea' : 'Save idea' }}
        </button>
        <button type="button" @click="open = false" class="btn-outline flex-1">Cancel</button>
    </div>
</form>