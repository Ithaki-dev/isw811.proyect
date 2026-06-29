<x-layout title="Register">
    <div class="min-h-[80vh] flex items-center justify-center">
        <div class="form-card">
            <div class="mb-6">
                <h1 class="text-xl font-semibold text-slate-800">Create an account</h1>
                <p class="text-sm text-slate-400 mt-1">Fill in the details below to get started.</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-600 text-sm rounded-lg px-4 py-3 mb-4">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="/register" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" name="name" id="name"
                           class="{{ $errors->has('name') ? 'form-input-error' : 'form-input' }}"
                           value="{{ old('name') }}"
                           placeholder="John Doe" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" name="email" id="email"
                           class="{{ $errors->has('email') ? 'form-input-error' : 'form-input' }}"
                           value="{{ old('email') }}"
                           placeholder="you@example.com" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" name="password" id="password"
                           class="{{ $errors->has('password') ? 'form-input-error' : 'form-input' }}"
                           placeholder="••••••••" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password_confirmation">Confirm password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           class="form-input"
                           placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn-primary w-full mt-2">
                    Create account
                </button>

                <p class="text-center text-sm text-slate-400 mt-4">
                    Already have an account?
                    <a href="/login" class="text-slate-700 font-medium hover:underline">Login</a>
                </p>
            </form>
        </div>
    </div>
</x-layout>