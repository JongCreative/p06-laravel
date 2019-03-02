<nav class="navbar navbar-expand-md navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/index') }}">
            {{config('app.name', 'p06 - project 6 laravel')}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- <div class="wrapper-nav collapse navbar-collapse" id="navbarSupportedContent"> --}}
            <!-- Left Side Of Navbar -->
            <article class='navbar-laravel navbar1'>
                <ul class="navbar-nav mr-auto">
                    <li><a class="btn btn-default" href="/index">home</a></li>
                    <li><a class="btn btn-default" href="/about">about</a></li>
                    <li><a class="btn btn-default" href="/services">services</a></li>
                    <li><a class="btn btn-default" href="/posts">dblist</a></li>
                    <li><a class="btn btn-default" href="/posts/create">create</a></li>
                </ul>
            </article>

            <!-- Right Side Of Navbar -->
            <article class='navbar-laravel navbar2'>
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="btn btn-default" href="/dashboard">dashboard</a></li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </article>
        {{-- </div> --}}
    </div>
</nav>