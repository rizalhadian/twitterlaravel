<header>
    <div class="navbar" style="background:#3991F4;">
    
        <div class="container">
            <div class="navbar-brand">
            <center><a href="{{URL::to('/')}}" style="color:white;">Twitter Application</a></center>
            </div>
            @if(Auth::id()!=null)
            <div>
            <a href="{{URL::to('/profile/'.Auth::id())}}" class="btn btn-light btn-sm">Profile</a>
            <a href="{{URL::to('/logout')}}" class="btn btn-secondary btn-sm">Logout</a>
            </div>
            @endif
            
        </div>
    </div>
</header>