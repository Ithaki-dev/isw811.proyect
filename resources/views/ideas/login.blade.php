<x-layout title="Login">
    <div style="min-height: 80vh; display: flex; align-items: center; justify-content: center;">
        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-8 w-full max-w-sm shadow-sm">
            <legend class="fieldset-legend text-lg font-medium">Login</legend>

            @if ($errors->any())
                <div class="alert alert-error mb-4 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="/login" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="fieldset-label" for="email">Email</label>
                    <input type="email" name="email" id="email"
                           class="input w-full @error('email') input-error @enderror"
                           value="{{ old('email') }}"
                           placeholder="you@example.com" required>
                </div>

                <div class="mb-6">
                    <label class="fieldset-label" for="password">Password</label>
                    <input type="password" name="password" id="password"
                           class="input w-full @error('password') input-error @enderror"
                           placeholder="••••••••" required>
                </div>

                <div class="join w-full">
                    <button type="submit" class="btn btn-primary join-item flex-1">
                        Login
                    </button>
                    <a href="/register" class="btn btn-ghost join-item">
                        Register
                    </a>
                </div>
            </form>
        </fieldset>
    </div>
</x-layout>