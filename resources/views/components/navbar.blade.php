<div class="navbar bg-base-100 shadow-sm">
  <div class="flex-none">
    <button class="btn btn-square btn-ghost">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block h-5 w-5 stroke-current"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path> </svg>
    </button>
  </div>
  <div class="flex-1">
    <a class="btn btn-ghost normal-case text-xl" href="/ideas">ISW811</a>
  </div>
  <div class="flex-none">
    <button class="btn btn-square btn-ghost">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block h-5 w-5 stroke-current"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path> </svg>
    </button>
  </div>
  @guest
  <div class="flex-none">
    <a href="/register" class="btn btn-ghost">Register</a>
    <a href="/login" class="btn btn-ghost">Login</a>
    </div>
  @else
  <div class="flex-none">
    <form action="/logout" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-ghost">Logout</button>
    </form>
    </div>
  @endguest

</div>