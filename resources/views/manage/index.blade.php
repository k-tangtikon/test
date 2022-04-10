@include('manage/header')
<title>จัดการข้อมูล</title>

<body>
    <!-- Check user is logged in -->
    @if (\Auth::check())
        @include('manage/navbar')
        @include('manage/manage-profile')
    @else
        <div class='error'> You are not logged in </div>
        <div> <a href="{{ url('login') }}">Login</a> | <a href="{{ url('register') }}">Register</a> </div>
    @endif
    <!-- Check user is logged in -->

</body>

</html>
