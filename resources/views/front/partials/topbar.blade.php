<div class="row bg-secondary py-2 px-xl-5">
    <div class="col-lg-6 d-none d-lg-block">
        <div class="d-inline-flex align-items-center">
            @auth
                <span class="text-dark"><b>{{ auth()->user()->name }}</b></span>
                <span class="text-muted px-2">|</span>

                <a class="text-primary" href="{{ route('settings') }}">Setari cont</a>
                <span class="text-muted px-2">|</span>

                <form class="d-none" method="POST" action="{{ route('logout') }}" id="logout-form">
                    @csrf
                </form>
                <a href="#" class="text-dark pl-2"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

            @endauth
            <span class="text-muted px-2">|</span>
            <a class="text-dark" href="">Support</a>
        </div>
    </div>
    <div class="col-lg-6 text-center text-lg-right">
        <div class="d-inline-flex align-items-center">
            <a class="text-dark px-2" href="">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a class="text-dark px-2" href="">
                <i class="fab fa-twitter"></i>
            </a>
            <a class="text-dark px-2" href="">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a class="text-dark px-2" href="">
                <i class="fab fa-instagram"></i>
            </a>
            <a class="text-dark pl-2" href="">
                <i class="fab fa-youtube"></i>
            </a>

        </div>
    </div>
</div>
