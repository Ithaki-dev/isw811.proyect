@if (session('success') || session('error') || session('warning') || session('info'))
    <div
        x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => show = false, 4000)"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-2"
        class="fixed bottom-6 right-6 z-50"
    >
        @if (session('success'))
            <div class="flex items-center gap-3 bg-white border border-green-200 text-green-700 px-5 py-3 rounded-xl shadow-lg text-sm">
                <span class="text-green-500">✓</span>
                {{ session('success') }}
                <button @click="show = false" class="ml-2 text-green-400 hover:text-green-600">✕</button>
            </div>
        @endif

        @if (session('error'))
            <div class="flex items-center gap-3 bg-white border border-red-200 text-red-700 px-5 py-3 rounded-xl shadow-lg text-sm">
                <span class="text-red-500">✕</span>
                {{ session('error') }}
                <button @click="show = false" class="ml-2 text-red-400 hover:text-red-600">✕</button>
            </div>
        @endif

        @if (session('warning'))
            <div class="flex items-center gap-3 bg-white border border-yellow-200 text-yellow-700 px-5 py-3 rounded-xl shadow-lg text-sm">
                <span class="text-yellow-500">⚠</span>
                {{ session('warning') }}
                <button @click="show = false" class="ml-2 text-yellow-400 hover:text-yellow-600">✕</button>
            </div>
        @endif

        @if (session('info'))
            <div class="flex items-center gap-3 bg-white border border-blue-200 text-blue-700 px-5 py-3 rounded-xl shadow-lg text-sm">
                <span class="text-blue-500">ℹ</span>
                {{ session('info') }}
                <button @click="show = false" class="ml-2 text-blue-400 hover:text-blue-600">✕</button>
            </div>
        @endif
    </div>
@endif