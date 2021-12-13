<nav class="nav">
    <p>Logged in as
        <span class="nav__user">{{Auth::user()->name}}</span>
    </p>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button class="nav__log-out">Logout</button>
    </form>
</nav>