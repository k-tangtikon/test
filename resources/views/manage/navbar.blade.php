<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #17202A ;">
    <!-- <div class="col col-1"></div> -->
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Test</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('index')}}">จัดการข้อมูลส่วนตัว</a>
                </li>

            </ul>
        </div>
    </div>
    <!-- This is what is not working well -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{ \Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('logout') }}">
                    <div class="nav_a">
                        ออกจากระบบ
                    </div>
                </a>

            </div>
        </li>
    </ul>

</nav>
