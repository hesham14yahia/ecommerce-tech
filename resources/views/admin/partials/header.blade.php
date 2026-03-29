<header class="header header-sticky header-border">
    <div class="container-fluid">
        <button class="header-toggler" type="button" data-coreui-toggle="sidebar" data-target="#sidebar" aria-label="Toggle navigation">
            <svg class="icon icon-lg">
                <use xlink:href="{{ asset('icons/free.svg#cil-menu') }}"></use>
            </svg>
        </button>
        <ul class="header-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}" target="_blank">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('icons/free.svg#cil-external-link') }}"></use>
                    </svg>
                </a>
            </li>
        </ul>
        <ul class="header-nav ms-3">
            <li class="nav-item dropdown">
                <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar bg-primary text-white">
                        <span>{{ substr(Auth::user()->name ?? 'A', 0, 1) }}</span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="dropdown-header bg-light py-2">
                        <div class="fw-semibold">Account</div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <svg class="icon me-2">
                                <use xlink:href="{{ asset('icons/free.svg#cil-account-logout') }}"></use>
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</header>
