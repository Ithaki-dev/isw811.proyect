@props(['idea' => null])

<div x-data="{ open: false }">

    {{-- Trigger button --}}
    <button @click="open = true" class="btn-primary">
        + New idea
    </button>

    {{-- Backdrop + Modal --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center"
        style="display: none;"
    >
        {{-- Blur backdrop --}}
        <div
            class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm"
            @click="open = false"
        ></div>

        {{-- Modal --}}
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="relative bg-white rounded-xl shadow-xl border border-slate-200 w-full max-w-lg mx-4 p-8 z-10"
        >
            {{-- Close button --}}
            <button
                @click="open = false"
                class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 transition"
            >
                ✕
            </button>

            <h2 class="text-lg font-semibold text-slate-800 mb-6">New idea</h2>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-600 text-sm rounded-lg px-4 py-3 mb-4">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="/ideas" method="POST" class="flex flex-col gap-4">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="title">Title</label>
                    <input type="text" name="title" id="title"
                           class="{{ $errors->has('title') ? 'form-input-error' : 'form-input' }}"
                           value="{{ old('title') }}"
                           placeholder="My awesome idea" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="description">Description</label>
                    <textarea name="description" id="description" rows="4"
                              class="{{ $errors->has('description') ? 'form-input-error' : 'form-input' }}"
                              placeholder="Describe your idea...">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="links">Links <span class="text-slate-400 font-normal">(optional, one per line)</span></label>
                    <textarea name="links" id="links" rows="2"
                              class="form-input"
                              placeholder="https://example.com">{{ old('links') }}</textarea>
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit" class="btn-primary flex-1">Save idea</button>
                    <button type="button" @click="open = false" class="btn-outline flex-1">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>  