<a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
    data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
    <h6 class="m-0">Sections - </h6>
    <i class="fa fa-angle-down text-dark"></i>
</a>
<nav class="collapse {{ $showMenu == 1 ? 'show' : '' }} position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light"
    id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
    <div class="navbar-nav w-100 overflow-hidden">

        @forelse($sections_menu as $section)
            <div class="nav-item nav-link py-3">
                <a href="{{ route('section', $section->slug) }}" style="color:#6c757d;">
                    <i class="{{ $section->icon ? $section->icon : 'fas fa-th-list' }} mr-2"></i>{{ $section->name }}
                    -
                </a>
                <a href="{{ route('section.products', $section->slug) }}" style="color:#6c757d;"> products
                    {{ $section->products_count }}</a>
            </div>

        @empty
            <p> No sections in site </p>
        @endforelse
    </div>
</nav>
