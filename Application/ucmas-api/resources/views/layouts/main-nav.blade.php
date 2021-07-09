<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>IT</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Inven</b>Tory</span>
    </a>
    <!-- Navbar -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('assets') }}/dist/img/AdminLTELogo.png" class="user-image profilePicture" alt="User Image">
                        <span class="hidden-xs">rmadeza@gmail.com</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('assets') }}/dist/img/AdminLTELogo.png" class="img-circle profilePicture" alt="User Image">
                            <p>
                                rmadeza@gmail.com
                            </p>
                        </li>

                        <!-- Menu Footer-->

                        <li class="user-footer">

                            {{-- <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <form asp-area="" asp-controller="Account" asp-action="Logout" method="post" id="logoutForm">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-default btn-flat">Sign out</button>
                                </div>
                            </form> --}}

                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /.navbar -->
</header>
