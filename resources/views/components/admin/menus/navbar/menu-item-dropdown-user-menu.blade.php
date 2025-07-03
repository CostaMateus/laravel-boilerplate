<li class="nav-item dropdown user-menu" >
    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" >
        @if ( auth()->user()->image )
            <img class="user-image rounded-circle shadow" src="{{ asset( "images/users/" . auth()->user()->image ) }}" onerror="this.onerror=null;this.src='{{ asset( 'images/users/default.svg' ) }}';" alt="{{ auth()->user()->name }}" >
        @else
            <img class="user-image rounded-circle shadow" src="{{ asset( "images/users/default.svg" ) }}" alt="User icon" >
        @endif
        <span class="d-none d-md-inline" >
            {{ auth()->user()->name }}
        </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end" >
        <li class="user-header" >
            @if ( auth()->user()->image )
                <img class="rounded-circle bg-white border-white shadow" src="{{ asset( "images/users/" . auth()->user()->image ) }}" onerror="this.onerror=null;this.src='{{ asset( 'images/users/default.svg' ) }}';" alt="{{ auth()->user()->name }}" >
            @endif
            <p>
                {{ auth()->user()->name }}
                <small>{{ __( "admin.menu.navbar.member-since" ) }} {{ auth()->user()->created_at->format( "m.Y" ) }}</small>
            </p>
        </li>
        <li class="user-footer" >
            <a class="btn btn-sm btn-outline-secondary" href="{{ route( config( "adminlte.usermenu_profile_href" ) ) }}" >
                {{ __( "admin.menu.navbar.profile" ) }}
            </a>

            <a class="btn btn-sm btn-outline-danger float-end" href="{{ route( "logout" ) }}" onclick="event.preventDefault(); document.getElementById( 'logout-form' ).submit();" >
                {{ __( "admin.menu.navbar.logout" ) }}
            </a>

            <form id="logout-form" action="{{ route( 'logout' ) }}" method="POST" class="d-none" >@csrf</form>
        </li>
    </ul>
</li>
