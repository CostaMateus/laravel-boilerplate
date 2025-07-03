<!doctype html>
<html lang="{{ str_replace( "_", "-", app()->getLocale() ) }}" >
    <head>
        {{-- Base Meta Tags --}}
        <meta charset="utf-8" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge" >
        <meta name="viewport" content="width=device-width, initial-scale=1" >
        <meta name="csrf-token" content="{{ csrf_token() }}" >

        {{-- Title --}}
        <title>{{ $title ?? "" }} | {{ config( "app.name", "Laravel Boilerplate" ) }}</title>

        {{-- Favicon --}}
		<link href="{{ asset( "favicons/favicon-32x32-modified.png"    ) }}" rel="icon" >
		<link href="{{ asset( "favicons/apple-touch-icon-modified.png" ) }}" rel="apple-touch-icon" >

        {{-- Google Fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com" >
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin >
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" >

        {{-- Fonts --}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" >

        {{-- CSS/JS --}}
        @vite( [
            "resources/sass/app.scss",
            "resources/css/app.css",
            "resources/js/app.js"
        ] )

        @yield( "css" )
    </head>

    <body class="layout-fixed sidebar-expand-lg sidebar-mini bg-body-tertiary bg-dots app-loaded" >

        <div class="app-wrapper" >
            {{-- Navbar --}}
            <x-admin.menus.navbar />

            {{-- Main Sidebar Container --}}
            <x-admin.menus.sidebar />

            {{-- Main --}}
            <main class="app-main px-2" >
                {{ $slot }}
            </main>

            {{-- Footer --}}
            <x-admin.footer />
        </div>

        <script type="module" >
            document.addEventListener( "DOMContentLoaded", function ()
            {
                const sidebarWrapper = document.querySelector( ".sidebar-wrapper" );

                if ( sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined" )
                {
                    OverlayScrollbarsGlobal.OverlayScrollbars( sidebarWrapper, {
                        scrollbars : {
                            theme : "os-theme-light",
                            autoHide : "leave",
                            clickScroll : true,
                        },
                    } );
                }
            } );
        </script>

        @yield( "script" )
    </body>
</html>
