<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-turbolinks="false" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
        <h5 class="font-weight-bold text-white">{{ config('app.name', 'The Turtle Stones') }}</h5>
    </form>
    <ul class="navbar-nav navbar-right">
        <img src="{{ asset('storage/profile-photos/'.Auth::user()->profile_photo_url) }}" class="circle-50 mr-1 h-7 w-7">
        <li class="dropdown"><a href="#" data-turbolinks="false" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            
            @if (!is_null( Auth::user()))
                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
            @else
                <div class="d-sm-none d-lg-inline-block">Hi, Welcome</div></a>
            @endif
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('profile.edit')}}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                @if (request()->get('is_admin'))
                <a href="/setting" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Setting
                </a>
                @endif
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
