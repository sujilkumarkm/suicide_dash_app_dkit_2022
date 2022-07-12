<nav class="navbar navbar-expand-lg bg-white" color-on-scroll="500">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <div class="brand-link p-0">
                <img src="{{ asset('img/logo.png') }}" alt="logo" style="height: 45px">
            </div>
        </a>
        <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">

            <ul class="navbar-nav   d-flex align-items-center">

                <li class="nav-item">
                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
                        @csrf
                        <a class="text-danger" href="{{ route('user.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Log out') }} </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
