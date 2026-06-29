<nav class="flex items-center justify-between h-14">
    <a href="/" class="font-semibold text-lg text-slate-800 tracking-tight hover:text-slate-600 transition">
        ISW811
    </a>

    <div class="flex items-center gap-2">
        @guest
            <a href="/login" class="btn-ghost">Login</a>
            <a href="/register" class="btn-primary">Register</a>
        @endguest

        @auth
            <span class="text-sm text-slate-500 mr-2">{{ auth()->user()->name }}</span>

            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn-ghost text-red-500 hover:text-red-600">
                    Logout
                </button>
            </form>
        @endauth
    </div>
</nav>