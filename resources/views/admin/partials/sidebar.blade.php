<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <svg class="nav-icon"><use href="#cil-speedometer"></use></svg>
                Dashboard
            </a>
        </li>
        <li class="nav-title">Components</li>
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon"><use href="#cil-puzzle"></use></svg>
                Base
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.bread') }}">
                        <svg class="nav-icon"><use href="#cil-note-add"></use></svg>
                        BREAD
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon"><use href="#cil-list"></use></svg>
                Orders
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.orders.index') }}">
                        <svg class="nav-icon"><use href="#cil-list"></use></svg>
                        List Orders
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon"><use href="#cil-cart"></use></svg>
                Products
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.products.index') }}">
                        <svg class="nav-icon"><use href="#cil-list-rich"></use></svg>
                        List Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.products.create') }}">
                        <svg class="nav-icon"><use href="#cil-plus"></use></svg>
                        Add Product
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon"><use href="#cil-people"></use></svg>
                Users
            </a>
            <ul class="nav-group-items">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.users') }}">
                        <svg class="nav-icon"><use href="#cil-user"></use></svg>
                        List Users
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
