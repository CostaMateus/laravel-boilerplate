@php
    $is_submenu = isset( $item[ "submenu" ] ) && count( $item[ "submenu" ] ) > 0;
    $is_active  = isset( $item[ "href"    ] ) && request()->routeIs( $item[ "href" ] );

    $active     = $is_active ? "active" : "";
    $menu_open  = $is_submenu && is_submenu_active( $item ) ? "menu-open" : "";

    $params     = isset( $item[ "params" ] ) && is_array( $item[ "params" ] )
        ? $item[ "params" ]
        : [];

    $class[]    = $item[ "class" ] ?? "";
    $class[]    = $active;
    $class      = implode( " ", $class );

    $href       = $is_submenu ? "#" : route( $item[ "href" ], $params );
@endphp

<li @isset( $item[ "id" ] ) id="{{ $item[ "id" ] }}" @endisset class="nav-item {{ $menu_open }}" >

    <a class="nav-link {{ $class }}" href="{{ $href }}" >

        {{-- Icon (optional) --}}
        @isset( $item[ "icon" ] )
            <i class="nav-icon my-auto fas fa-lg {{ $item[ "icon" ] ?? "" }} {{ isset( $item[ "icon_color" ] ) ? "text-" . $item[ "icon_color" ] : "" }}" ></i>
        @endisset

        <p class="m-0" >
            @if ( config( "adminlte.lang_sidebar_enabled" ) )
                {{ __( "admin.menu.sidebar.{$item[ "text" ]}" ) }}
            @else
                {{ $item[ "text" ] }}
            @endif

            {{-- Label (optional) --}}
            @isset( $item[ "label" ] )
                <span class="badge badge-{{ $item[ "label_color" ] ?? "primary" }} right" >
                    {{ $item[ "label" ] }}
                </span>
            @endisset

            @if ( $is_submenu )
                <i class="nav-arrow fas fa-lg fa-chevron-right"></i>
            @endif
        </p>
    </a>

    @if( $is_submenu )
        <ul class="nav nav-treeview" >
            @each( "components.admin.menus.sidebar.nav-item", $item[ "submenu" ], "item" )
        </ul>
    @endif
</li>
