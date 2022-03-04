
@auth()
    @include('layouts.navbars.navs.auth')
    {{-- Is used to determine whether a user is authenticated or not       --}}
@endauth

@guest()
    @include('layouts.navbars.navs.guest')
    {{-- is used to determine whether a user is a guest --}}
@endguest
