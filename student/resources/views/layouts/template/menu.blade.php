<!-- example 2 - using auto margins -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2" style="margin: 0 40px 0 40px">
        <a class="navbar-brand" href="/">
            <img src="{{asset ('images/logo.png') }}" href="/" width="80" height="60" class="align-baseline" alt="Student Service">  
        </a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/news">Blogs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/jobs">Jobs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/apartment">Apartment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/course">Course</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about">About us</a>
            </li>
        </ul>
    </div>

    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            @if(Auth::check())
            <p class="align-items-center"style="margin: 0; color: rgba(255,255,255,.5); font-size: 18px;">{{ Auth::user()->first_name }} </p>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Dasboard <i class="fas fa-user-shield" style="font-size: 25px; vertical-align: middle;"></i></a>
                </li>   
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout <i class="fas fa-sign-out-alt" style="font-size: 25px; vertical-align: middle;"></i></a>
                </li>
            @else 
                <li class="nav-item">
                    <a class="nav-link" href="/sign-in">Sign in <i class="fas fa-user-circle" style="font-size: 25px; vertical-align: middle;"></i></a>
                </li>
            @endif
        </ul>
    </div>
</nav>
