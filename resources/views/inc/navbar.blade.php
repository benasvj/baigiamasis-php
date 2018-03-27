<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="">Legendų Lyga</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
            <span class="navbar-toggler-icon"></span>
        </button>
                  
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Pradinis<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('forum.index')}}">Forumas</a>
                </li>
                    <li class="dropdown open">
                    @guest
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">Vartotojas</a>
                        <div class="dropdown-menu show" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 37px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                            <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </div>
                    @else
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">{{ Auth::user()->name }}</a>
                        <div class="dropdown-menu show" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 37px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    @endguest
            </ul>
        </div>
</nav>