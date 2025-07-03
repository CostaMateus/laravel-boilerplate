@php
    $active = request()->routeIs( $item[ "href" ] ) ? "active border-bottom border-primary" : "";
@endphp

<li @isset( $item[ "id" ] ) id="{{ $item[ "id" ] }}" @endisset class="nav-item" >

    <a class="nav-link {{ $item[ "class" ] }} @isset( $item[ "shift" ] ) {{ $item[ "shift" ] }} @endisset {{ $active }}"
       href="{{ route( $item[ "href" ] ) }}"
       @isset( $item[ "target" ] ) target="{{ $item[ "target" ] }}" @endisset
       {!! $item[ "data-compiled" ] ?? "" !!} >

        {{-- Icon (optional) --}}
        @isset( $item[ "icon" ] )
            <i class="{{ $item[ "icon" ] ?? "" }} {{
                isset( $item[ "icon_color" ] ) ? "text-" . $item[ "icon_color" ] : ""
            }} my-auto " ></i>
        @endisset

        <p class="m-0" >
            @if ( config( "adminlte.lang_navbar_enabled" ) )
                {{ __( "admin.menu.navbar.{$item[ "text" ]}" ) }}
            @else
                {{ $item[ "text" ] }}
            @endif

            {{-- Label (optional) --}}
            @isset( $item[ "label" ] )
                <span class="badge badge-{{ $item[ "label_color" ] ?? "primary" }} right" >
                    {{ $item[ "label" ] }}
                </span>
            @endisset
        </p>
    </a>
</li>
