@props(['idea'])

<div x-data="{ open: false }">
    <button @click="open = true" class="btn-ghost btn-sm">Edit</button>

    <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center" style="display: none;"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">

        <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="open = false"></div>

        <div class="relative bg-white rounded-xl shadow-xl border border-slate-200 w-full max-w-lg mx-4 p-8 z-10"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100">

            <button @click="open = false" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600">✕</button>
            <h2 class="text-lg font-semibold text-slate-800 mb-6">Edit idea</h2>

            <x-idea.form :idea="$idea" />
        </div>
    </div>
</div>