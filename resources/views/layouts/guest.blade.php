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
        <div class="container" >
            <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center bg-light" >
                <div>
                    <a href="/" >
                        <x-application-logo width="75" height="75" />
                    </a>
                </div>

                <div class="row w-100" >
                    <div class="col-12 col-sm-10 col-md-8 col-xl-6 mx-auto px-0" >
                        <div class="card border-0 bg-white mt-4 p-4 shadow" >
                            <div class="card-body" >
                                {{ $slot }}
                            </div>
                        </div>

                        <div class="mt-4 text-center" >
                            <x-buttons.link class="p-0 align-baseline small text-secondary m-0" :href="route( 'welcome' )" >
                                {{ __( "Back to home" ) }}
                            </x-buttons.link>

                            <x-footer />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
