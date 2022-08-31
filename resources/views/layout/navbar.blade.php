<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('admin')}}">Admin</a>
            </li>
            @if(\App\Utils\UserSession::isConnected())
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <span class="nav-link">{{\App\Utils\UserSession::getUser()->email}}</span>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <form action="{{route('signout')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-dark">Déconnecter</button>
                    </form>
                </li>
            </ul>
            @else
            <li class="nav-item active">
                <a class="nav-link" href="{{route('signin')}}">Connexion</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('signup')}}">Inscription</a>
            </li>
            @endif
        </ul>
    </div>
</nav>