<div class="navbar bg-base-100 shadow-sm">
    <div class="flex-none">
        <button class="btn btn-square btn-ghost">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block h-5 w-5 stroke-current">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <div class="flex-1">
        <a href="/ideas" class="btn btn-ghost text-xl">ISW811</a>
    </div>

    <div class="flex-none">
        <button class="btn btn-square btn-ghost">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block h-5 w-5 stroke-current">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0" />
            </svg>
        </button>
    </div>

    @guest
        <div class="flex-none">
            <a href="/register" class="btn btn-ghost">Register</a>
            <a href="/login" class="btn btn-ghost">Login</a>
        </div>
    @endguest

    @auth

        @can('view-admin')
            <div class="flex-none">
                <a href="/admin" class="btn btn-ghost">Admin</a>
            </div>
        @endcan

        <div class="flex-none">
            <form action="/logout" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-ghost">
                    Logout
                </button>
            </form>
        </div>

    @endauth

</div>