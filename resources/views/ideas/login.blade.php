<x-layout title="Login">
    <div style="min-height: 80vh; display: flex; align-items: center; justify-content: center;">
        <form action="/login" method="POST">
            @csrf
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-8 w-80">
                <legend class="fieldset-legend text-lg font-medium">Login</legend>

                @if ($errors->any())
                    <div class="alert alert-error mb-4 text-sm">
                        {{ $errors->first() }}
                    </div>
                @endif

                <label class="label" for="email">Email</label>
                <input type="email" name="email" id="email"
                       class="input w-full @error('email') input-error @enderror"
                       value="{{ old('email') }}"
                       placeholder="you@example.com" required>

                <label class="label mt-2" for="password">Password</label>
                <input type="password" name="password" id="password"
                       class="input w-full @error('password') input-error @enderror"
                       placeholder="••••••••" required>

                <button type="submit" class="btn btn-neutral w-full mt-4">Login</button>

                <p class="text-center text-sm text-base-content/50 mt-3">
                    Don't have an account?
                    <a href="/register" class="link link-primary">Register</a>
                </p>
            </fieldset>
        </form>
    </div>
</x-layout>