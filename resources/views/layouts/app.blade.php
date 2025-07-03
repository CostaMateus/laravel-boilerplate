<!DOCTYPE html>
<html lang="{{ str_replace( "_", "-", app()->getLocale() ) }}" >
    <head>
        {{-- Base Meta Tags --}}
        <meta charset="utf-8" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge" >
        <meta name="viewport" content="width=device-width, initial-scale=1" >
        <meta name="csrf-token" content="{{ csrf_token() }}" >

        {{-- Title --}}
        <title>{{ config( "app.name", "Laravel Boilerplate" ) }}</title>

        {{-- Favicon --}}
		<link href="{{ asset( "favicons/favicon-32x32-modified.png"    ) }}" rel="icon" >
		<link href="{{ asset( "favicons/apple-touch-icon-modified.png" ) }}" rel="apple-touch-icon" >

        {{-- Google Fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com" >
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin >
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" >

        {{-- CSS/JS --}}
        @vite( [
            "resources/sass/app.scss",
            "resources/css/app.css",
            "resources/js/app.js"
        ] )
    </head>
    <body class="bg-light text-dark" >
        <div class="min-vh-100 bg-light" >

            @include( "layouts.navigation" )

            {{-- Page Heading --}}
            @isset( $header )
                <header class="bg-white shadow-sm border-bottom mb-4" >
                    <div class="container py-4 px-3" >
                        {{ $header }}
                    </div>
                </header>
            @endisset

            {{-- Page Content --}}
            <main>
                {{ $slot }}
            </main>

        </div>
    </body>
</html>
