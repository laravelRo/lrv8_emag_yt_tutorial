 <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
     <a href="" class="text-decoration-none d-block d-lg-none">
         <h1 class="m-0 display-5 font-weight-semi-bold"><span
                 class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
     </a>
     <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
         <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
         <div class="navbar-nav mr-auto py-0">
             <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                 Home
             </a>
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Products</a>
                 <div class="dropdown-menu rounded-0 m-0">
                     @forelse($sections_prods as $section_prod)
                         <a href="{{ route('section.products', $section_prod->slug) }}"
                             class="dropdown-item">{{ $section_prod->name }} ({{ $section_prod->products_count }})</a>
                     @empty
                     @endforelse

                 </div>
             </div>
             <a href="{{ route('brands') }}"
                 class="nav-item nav-link {{ request()->routeIs('brands') ? 'active' : '' }}">
                 Brands
             </a>
             <a href="" class="nav-item nav-link">Contact</a>
             <a href="" class="nav-item nav-link">About Us</a>


         </div>

         <div class="navbar-nav ml-auto py-0">
             @guest
                 <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                 <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
             @endguest
             {{-- @auth
                <form class="d-none" method="POST" action="{{route('logout')}}" id="logout-form">
                @csrf
                </form>
                <a href="#"  class="nav-item nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
             @endauth --}}
         </div>
     </div>
 </nav>
