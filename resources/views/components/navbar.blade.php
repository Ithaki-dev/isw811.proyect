<div class="navbar bg-base-200 shadow-sm px-4">
    <div class="flex-1">
        <a href="/ideas" class="btn btn-ghost text-xl font-semibold">ISW811</a>
    </div>

    <div class="flex-none gap-2">
        @guest
            <a href="/register" class="btn btn-ghost btn-sm">Register</a>
            <a href="/login" class="btn btn-primary btn-sm">Login</a>
        @endguest

        @auth
            @can('view-admin')
                <a href="/admin" class="btn btn-ghost btn-sm">Admin</a>
            @endcan

            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar placeholder">
                    <div class="bg-neutral text-neutral-content w-9 rounded-full">
                        <span class="text-sm">{{ substr(auth()->user()->name, 0, 1) }}</span>
                    </div>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-10 mt-3 w-48 p-2 shadow border border-base-300">
                    <li class="menu-title text-xs">{{ auth()->user()->name }}</li>
                    <li class="menu-title text-xs opacity-50">{{ auth()->user()->email }}</li>
                    <div class="divider my-1"></div>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full text-left text-error">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth
    </div>
</div>