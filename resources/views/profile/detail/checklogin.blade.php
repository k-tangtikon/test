    <!-- Check user is logged in -->
    @if (\Auth::check())

    @else
        {{ redirect()->to('/pagelogin')->send() }}
    @endif
    <!-- Check user is logged in -->
