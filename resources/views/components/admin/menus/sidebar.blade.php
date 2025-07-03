<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="light" >
    <div class="sidebar-brand" >
        <a href="{{ route( config( "adminlte.menu.sidebar.href" ) ) }}" class="brand-link" >
            <x-application-logo width="32" height="32" class="brand-image mx-2" />
            <span class="brand-text fw-light m-0" >
                {{ config( "adminlte.sidebar.title" ) ?? config( "app.name", "Laravel Boilerplate" ) }}
            </span>
        </a>
    </div>

    <div class="sidebar-wrapper" >
        <nav class="mt-2" >
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false" >
                @each( "components.admin.menus.sidebar.nav-item", config( "adminlte.menu.sidebar.items" ), "item" )
            </ul>
        </nav>
    </div>
</aside>
