<nav class="app-header navbar navbar-expand navbar-white navbar-light bg-body" >
    <div class="container-fluid" >
        <ul class="navbar-nav" >
            <li class="nav-item" >
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button" >
                    <i class="fas fa-bars" ></i>
                </a>
            </li>
            @each( "components.admin.menus.navbar.nav-item", config( "adminlte.menu.navbar.items" ), "item" )
        </ul>
        <ul class="navbar-nav ms-auto" >
            @if ( config( "adminlte.usermenu_enabled" ) )
                <x-admin.menus.navbar.menu-item-dropdown-user-menu />
            @else
                <x-admin.menus.navbar.menu-item-logout-link />
            @endif
        </ul>
    </div>
</nav>
