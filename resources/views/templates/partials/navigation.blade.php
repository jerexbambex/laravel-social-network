<nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-top: 6px solid #40A4F4;">
    <a class="navbar-brand" href="/">Jerex</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @if (Auth::check())
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="#">Timeline</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('friend.index') }}">Friends</a></li>

             <form class="form-inline my-2 my-lg-0" action="{{ route('search.results') }}">
                <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Find people" aria-label="Search" name="query">
                <button class="btn btn-outline-secondary btn-sm my-2 my-sm-0" type="submit">Search</button>
            </form>
        </ul>
           
        @endif
        <ul class="navbar-nav ml-auto">
            @if (Auth::check())
                <li class="nav-item"><a class="nav-link navbar-text" href="{{ route('profile.index', ['username' => Auth::user()->username]) }}">{{ Auth::user()->getNameOrUsername() }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('profile.edit') }}">Update profile</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('auth.signout') }}">Sign out</a></li>
            @else
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('auth.signup') }}">Sign up <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.signin') }}">Sign in</a>
                </li>
            @endif
           {{--  <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li> --}}
        </ul>
    </div>
</nav>