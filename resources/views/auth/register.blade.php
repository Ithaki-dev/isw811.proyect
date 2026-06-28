<x-layout title="Register">
    <div style="min-height: 80vh; display: flex; align-items: center; justify-content: center;">
        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-8 w-full max-w-sm shadow-sm">
            <legend class="fieldset-legend text-lg font-medium">Register</legend>

            @if ($errors->any())
                <div class="alert alert-error mb-4 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="/register" method="POST">
                @csrf

                <label class="label" for="name">Name</label>
                <input type="text" name="name" id="name"
                       class="input w-full mb-4 @error('name') input-error @enderror"
                       value="{{ old('name') }}"
                       placeholder="John Doe" required>

                <label class="label" for="email">Email</label>
                <input type="email" name="email" id="email"
                       class="input w-full mb-4 @error('email') input-error @enderror"
                       value="{{ old('email') }}"
                       placeholder="you@example.com" required>

                <label class="label" for="password">Password</label>
                <input type="password" name="password" id="password"
                       class="input w-full mb-4 @error('password') input-error @enderror"
                       placeholder="••••••••" required>

                <label class="label" for="password_confirmation">Confirm password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       class="input w-full mb-6"
                       placeholder="••••••••" required>

                <div class="join w-full">
                    <button type="submit" class="btn btn-primary join-item flex-1">
                        Register
                    </button>
                    <a href="/login" class="btn btn-ghost join-item">
                        Login
                    </a>
                </div>
            </form>
        </fieldset>
    </div>
</x-layout>