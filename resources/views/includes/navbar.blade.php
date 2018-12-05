<nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top">
    <a class="navbar-brand d-lg-none site-title" href="/">{{ Config::get('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="nav d-flex text-center">
            <li class="nav-item flex-fill align-self-lg-center">
                <a class="nav-link" href="/receitas">Receitas <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item flex-fill align-self-lg-center">
                <a class="nav-link" href="/categoria">Categorias <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active flex-fill align-self-lg-center d-none d-lg-block">
                <a class="site-title nav-link" href="/">{{ Config::get('app.name') }}<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item flex-fill align-self-lg-center">
                <a class="nav-link" href="/create">Envie sua receita</a>
            </li>
            @guest
            <li class="nav-item flex-fill align-self-center">
                <a class="nav-link" href="/login">Login</a>
            </li>
            @else
            <li class="nav-item dropdown flex-fill align-self-center">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ head(explode(' ', trim(Auth::user()->name))) }}
                </a>
                <div class="dropdown-menu font-neuton" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/home">Minhas receitas</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}">{{ __('Logout') }}</a>
                </div>
            </li>
            @endguest

        </ul>
    </div>
</nav>
