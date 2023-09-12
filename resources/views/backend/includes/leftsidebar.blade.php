@php
    $setting = \App\Models\Settings::first();
@endphp
<div id="left-sidebar" class="sidebar">
    <div class="navbar-brand">
        <a href="{{route('dashboard.index')}}"><img src="{{asset($setting->logo1)}}" alt="{{$setting->name}} Logo" class="img-fluid logo"><span>{{$setting->name}}</span></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm btn-default float-right"><i class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                <img src="{{Auth::user()->user_image}}" class="user-photo" style="width: 86px; height: 86px;" alt="User Profile Picture">
            </div>
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{Auth::user()->first_name.' '.Auth::user()->last_name}}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account">
                    <li><a href="{{route('profile.index')}}"><i class="icon-user"></i>My Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-power"></i>Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu">
                <li class="{{ request()->is('dashboard') || request()->is('/') ? 'active' : '' }}">
                    <a href="{{route('dashboard.index')}}"><i class="icon-home"></i><span>Dashboard</span></a>
                </li>
                <li class="{{ request()->is('profile*') || request()->is('users*') || request()->is('roles*') || request()->is('settings*') ? 'active' : '' }}">
                    <a href="#forms" class="has-arrow"><i class="icon-settings"></i><span>Settings</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li class="{{ request()->is('profile*') ? 'active' : '' }}"><a href="{{route('profile.index')}}">Profile</a></li>
                        <li class="{{ request()->is('users*') ? 'active' : '' }}"><a href="{{route('users.index')}}">Users</a></li>
                        <li class="{{ request()->is('roles*') ? 'active' : '' }}"><a href="{{route('roles.index')}}">Roles</a></li>
                        <li class="{{ request()->is('settings*') ? 'active' : '' }}"><a href="{{route('settings.index')}}">settings</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
