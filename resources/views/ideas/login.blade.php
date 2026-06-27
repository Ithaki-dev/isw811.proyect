<x-layout>
    <h1 class="text-2xl font-bold">Login</h1>
    <form action="/login" method="POST" class="mt-4">
        @csrf
        <div class="mb-4">
        <label for="email" class="block text-white font-bold mb-2">Email:</label>
        <input type="email" name="email" id="email" class="border border-gray-300 rounded-lg p-2 w-full" required>
        </div>
        <div class="mb-4">
        <label for="password" class="block text-white font-bold mb-2">Password:</label>
        <input type="password" name="password" id="password" class="border border-gray-300 rounded-lg p-2 w-full" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Login</button>
    </form>
</x-layout>