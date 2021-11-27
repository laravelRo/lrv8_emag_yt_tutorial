@include('admin.partials.head')

<body class="sb-nav-fixed">
    @include('admin.partials.navbar')

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('admin.partials.sidenav')
        </div>
        <div id="layoutSidenav_content">
            @include('admin.partials.messages')
            @yield('content')
            @include('admin.partials.footer')
        </div>
    </div>


    {{-- ==== scripturi si livewire --}}
    @include('admin.partials.scripts')
    @include('sweetalert::alert')

    @livewireScripts
    @yield('customJs')
</body>

</html>
