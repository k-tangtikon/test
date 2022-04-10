<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/navabout.css" type="text/css">
<link rel="stylesheet" href="css/nav.css" type="text/css">
<link rel="stylesheet" href="css/text.css" type="text/css">
<link rel="stylesheet" href="css/post.css" type="text/css">

<nav id="navbar_top" class="navbar-expand-lg navbar-dark rounded" style="background-color: #52aaa4;">
    <div class="container">
        <div class="d-grid gap-2">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#profile">
                        <div class="txtnav">About</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#work">
                        <div class="txtnav">Work</div>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="txtnav">Resume</div>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="pdf/resumeeng.pdf" target="_blank">
                                <div class="txtnav-pdf text-center">ENG</div>
                            </a>
                        </li>
                        <hr class="dropdown-divider">
                        <li>
                            <a class="dropdown-item" href="pdf/resumeth.pdf" target="_blank">
                                <div class="txtnav-pdf text-center">THAI</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{url('logoutprofile')}}">
                        <div class="txtnav">Logout</div>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<nav class="navbar-expand-custom navbar-mainbg">

    <div class=" navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            <div class="hori-selector">
                <div class="left"></div>
                <div class="right"></div>
            </div>
            <li class="nav-item active">
                <a class="nav-link" href="javascript:void(0);" id="bt_about_pub">
                    <div class="txtnav2">About</div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0);" id="bt_edu_pub">
                    <div class="txtnav2">Education</div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0);" id="bt_work_pub">
                    <div class="txtnav2">Experience</div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0);" id="bt_skills_pub">
                    <div class="txtnav2">Skills</div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0);" id="bt_contact_pub">
                    <div class="txtnav2">Contact</div>
                </a>
            </li>
        </ul>
    </div>
</nav>
