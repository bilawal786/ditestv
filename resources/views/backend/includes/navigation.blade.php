<nav class="navbar navbar-fixed-top">
    <div class="container-fluid">

        <div class="navbar-left">
            <div class="navbar-btn">
                <a href="{{route('dashboard.index')}}"><img src="{{asset('images/icon-light.svg')}}" alt="HexaBit Logo" class="img-fluid logo"></a>
                <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
            </div>
            <a href="javascript:void(0);" class="icon-menu btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
        </div>

        <div class="navbar-right">


            <div id="navbar-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown dropdown-animated scale-left">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown"><i class="icon-settings"></i></a>
                        <ul class="dropdown-menu menu-icon app_menu">
                            <li>
                                <a class="#" href="{{ route('profile.index') }}">
                                    <i class="icon-user"></i>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li>
                                <a class="#" href="{{ route('users.index') }}">
                                    <i class="icon-users"></i>
                                    <span>Users</span>
                                </a>
                            </li>
                            <li>
                                <a class="#" href="{{ route('roles.index') }}">
                                    <i class="fa fa-tasks"></i>
                                    <span>Roles</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="icon-menu"><i class="icon-power"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>
