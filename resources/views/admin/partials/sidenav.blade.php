<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            @can('manager')
                <div class="sb-sidenav-menu-heading"><i class="fas fa-users-cog"></i> Users</div>
                <a class="nav-link" href="{{ route('show.staff') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-shield"></i></div>
                    Staff
                </a>
                <a class="nav-link" href="{{ route('show.users') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Users
                </a>
            @endcan
            <div class="sb-sidenav-menu-heading">Content</div>
            <a class="nav-link" href="{{ route('sections.list') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-ellipsis-h"></i></div>
                Sections
            </a>
            <a class="nav-link" href="{{ route('categories.list') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
                Categories
            </a>
            <a class="nav-link" href="{{ route('brands.list') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-copyright"></i></div>
                Brands
            </a>
            <a class="nav-link" href="{{ route('products.list') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-shopping-basket"></i></div>
                Products
            </a>
            <div class="sb-sidenav-menu-heading">Orders</div>
            {{-- linkul catre pagina principala de comenzi --}}
            <a class="nav-link" href="{{ route('admin.orders.list') }}">
                <div class="sb-nav-link-icon"><i class="fab fa-shopify"></i></div>
                Orders
            </a>
            {{-- linkul catre pagina principala de comenzi --}}
            <a class="nav-link" href="{{ route('admin.coupons.list') }}">
                <div class="sb-nav-link-icon"><i class="fab fa-shopify"></i></div>
                Coupons
            </a>



        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ Auth::user()->type }}
    </div>
</nav>
