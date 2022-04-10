    <!-- Show any success message -->
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
    <!-- Show any success message -->

    <!-- Check user is logged in -->
    @if (\Auth::check())
        <div class='dash'>You are logged in as : {{ \Auth::user()->username }} , <a href="{{ url('logout') }}">
                Logout</a></div>
    @else
        <div class='error'> You are not logged in </div>
        <div> <a href="{{ url('login') }}">Login</a> | <a href="{{ url('register') }}">Register</a> </div>
    @endif
    <!-- Check user is logged in -->
