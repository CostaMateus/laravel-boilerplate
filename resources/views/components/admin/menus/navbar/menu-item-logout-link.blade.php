<li class="nav-item" >
    <a class="nav-link" href="{{ route( "logout" ) }}" onclick="event.preventDefault(); document.getElementById( 'logout-form' ).submit();" >
        <i class="fas fa-power-off text-danger" ></i>
        {{ __( "admin.menu.navbar.logout" ) }}
    </a>

    <form id="logout-form" action="{{ route( 'logout' ) }}" method="POST" class="d-none" >@csrf</form>
</li>
