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
            "resources/js/app.js"
        ] )

        <style>
            body {
                font-family: 'Inter', sans-serif;
                background: linear-gradient(135deg, var(--lv-primary) 0%, var(--lv-dark) 100%);
                min-height: 100vh;
            }

            .hero-section {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                border-radius: 20px;
                border: 1px solid rgba(255, 255, 255, 0.2);
            }

            .feature-card {
                background: rgba(255, 255, 255, 0.95);
                border-radius: 15px;
                transition: all 0.3s ease;
                border: none;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            }

            .feature-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            }

            .feature-icon {
                width: 60px;
                height: 60px;
                background: linear-gradient(135deg, var(--lv-primary), var(--lv-dark));
                border-radius: 15px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 1.5rem;
                margin-bottom: 1rem;
            }

            .logo-container {
                width: 120px;
                height: 120px;
                border-radius: 50%;
                overflow: hidden;
                border: 4px solid rgba(255, 255, 255, 0.3);
                margin: 0 auto 2rem;
            }

            .logo-container img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .btn-custom {
                background: linear-gradient(135deg, var(--lv-primary), var(--lv-dark));
                border: none;
                border-radius: 25px;
                padding: 8px 12px;
                font-weight: 500;
                transition: all 0.3s ease;
                color: white;
            }

            .btn-custom.btn-lg {
                padding: 9px 16px;
            }

            .btn-custom:hover {
                background: linear-gradient(135deg, var(--lv-dark), var(--lv-primary));
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(74, 112, 170, 0.4);
                color: white;
            }

            .btn-custom:focus,
            .btn-custom:active {
                background: linear-gradient(135deg, var(--lv-dark), var(--lv-primary));
                color: white;
                box-shadow: 0 0 0 0.2rem rgba(164, 186, 232, 0.5);
            }

            .stats-card {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                border-radius: 15px;
                border: 1px solid rgba(255, 255, 255, 0.2);
                color: white;
            }

            .text-gradient {
                background: linear-gradient(135deg, var(--lv-light), white);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .navbar-dark .navbar-brand:hover {
                color: var(--lv-light) !important;
            }

            .navbar-dark .navbar-nav .nav-link:hover {
                color: var(--lv-light) !important;
            }

            .btn-outline-light:hover {
                background-color: var(--lv-light);
                border-color: var(--lv-light);
                color: var(--lv-dark);
            }

            .feature-card .text-success {
                color: var(--lv-primary) !important;
            }

            .feature-card,
            .btn-custom,
            .stats-card {
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            @media (max-width: 768px) {
                .hero-section {
                    margin: 1rem;
                    padding: 2rem !important;
                }

                .display-4 {
                    font-size: 2.5rem;
                }

                .display-5 {
                    font-size: 2rem;
                }

                .display-6 {
                    font-size: 1.75rem;
                }
            }

            .stats-card code {
                background: rgba(255, 255, 255, 0.1);
                padding: 0.25rem 0.5rem;
                border-radius: 0.375rem;
                font-weight: 500;
            }
        </style>
    </head>
    <body>
        {{-- Navigation --}}
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: rgba(27, 45, 72, 0.9); backdrop-filter: blur(10px);" >
            <div class="container" >
                <a class="navbar-brand fw-bold" href="#" >
                    <img src="{{ asset( "images/logo.png" ) }}" alt="Logo" width="40" height="40" class="rounded-circle me-2" >
                    {{ __( "welcome.nav.brand" ) }}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" >
                    <span class="navbar-toggler-icon" ></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav" >
                    <ul class="navbar-nav ms-auto me-0" >
                        @if ( Route::has( "login" ) )
                            @auth
                                <li class="nav-item" >
                                    <a href="{{ url( "/dashboard" ) }}" class="nav-link" >
                                        <i class="fas fa-tachometer-alt me-1" ></i>
                                        {{ __( "welcome.nav.dashboard" ) }}
                                    </a>
                                </li>
                            @else
                                <li class="nav-item" >
                                    <a href="{{ route( "login" ) }}" class="nav-link" >
                                        <i class="fas fa-sign-in-alt me-1" ></i>
                                        {{ __( "welcome.nav.login" ) }}
                                    </a>
                                </li>
                                @if ( Route::has( "register" ) )
                                    <li class="nav-item" >
                                        <a href="{{ route( "register" ) }}" class="btn btn-custom text-white ms-lg-2 me-0" >
                                            <i class="fas fa-user-plus me-1" ></i>
                                            {{ __( "welcome.nav.create_account" ) }}
                                        </a>
                                    </li>
                                @endif
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        {{-- Hero Section --}}
        <section class="py-5" style="margin-top: 80px;" >
            <div class="container" >
                <div class="row justify-content-center" >
                    <div class="col-lg-10" >
                        <div class="hero-section p-5 text-center text-white" >
                            <div class="logo-container" >
                                <img src="{{ asset( "images/logo.png" ) }}" alt="Laravel Boilerplate Logo" >
                            </div>

                            <h1 class="display-4 fw-bold mb-4" >
                                {{ __( "welcome.hero.title" ) }}
                            </h1>
                            <p class="lead mb-4" >
                                {{ __( "welcome.hero.description" ) }}
                            </p>

                            <div class="row g-3 mb-4" >
                                <div class="col-sm-6 col-md-3" >
                                    <div class="stats-card p-3 h-100 d-flex flex-column justify-content-center" >
                                        <h3 class="h5 mb-1" >{{ __( "welcome.hero.framework.title" ) }}</h3>
                                        <small>{{ __( "welcome.hero.framework.description" ) }}</small>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3" >
                                    <div class="stats-card p-3 h-100 d-flex flex-column justify-content-center" >
                                        <h3 class="h5 mb-1" >{{ __( "welcome.hero.php.title" ) }}</h3>
                                        <small>{{ __( "welcome.hero.php.description" ) }}</small>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3" >
                                    <div class="stats-card p-3 h-100 d-flex flex-column justify-content-center" >
                                        <h3 class="h5 mb-1" >{{ __( "welcome.hero.ui.title" ) }}</h3>
                                        <small>{{ __( "welcome.hero.ui.description" ) }}</small>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3" >
                                    <div class="stats-card p-3 h-100 d-flex flex-column justify-content-center" >
                                        <h3 class="h5 mb-1" >{{ __( "welcome.hero.tools.title" ) }}</h3>
                                        <small>{{ __( "welcome.hero.tools.description" ) }}</small>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-3 justify-content-center flex-wrap" >
                                @guest
                                    <a href="{{ route( "register" ) }}" class="btn btn-custom btn-lg text-white" >
                                        <i class="fas fa-rocket me-2" ></i>
                                        {{ __( "welcome.hero.get_started" ) }}
                                    </a>
                                @else
                                    <a href="{{ url( "/dashboard" ) }}" class="btn btn-custom btn-lg text-white" >
                                        <i class="fas fa-tachometer-alt me-2" ></i>
                                        {{ __( "welcome.hero.go_to_dashboard" ) }}
                                    </a>
                                @endguest

                                <a href="https://laravel.com/docs" class="btn btn-outline-light btn-lg" target="_blank" >
                                    <i class="fas fa-book me-2" ></i>
                                    {{ __( "welcome.hero.documentation" ) }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Features Section --}}
        <section class="py-5" >
            <div class="container" >
                <div class="text-center mb-5" >
                    <h2 class="display-5 fw-bold text-gradient mb-3" >
                        {{ __( "welcome.features.title" ) }}
                    </h2>
                    <p class="lead text-white" >
                        {{ __( "welcome.features.description" ) }}
                    </p>
                </div>

                <div class="row g-4" >
                    {{-- Core Framework --}}
                    <div class="col-lg-4 col-md-6" >
                        <div class="feature-card p-4 h-100" >
                            <div class="feature-icon" >
                                <i class="fas fa-cogs" ></i>
                            </div>
                            <h4 class="fw-bold mb-3 text-lv-dark" >
                                {{ __( "welcome.features.feature_1.title" ) }}
                            </h4>
                            <ul class="list-unstyled" >
                                <li>
                                    <i class="fas fa-check-circle text-success me-2" ></i>
                                    {{ __( "welcome.features.feature_1.list.0" ) }}
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success me-2" ></i>
                                    {{ __( "welcome.features.feature_1.list.1" ) }}
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success me-2" ></i>
                                    {{ __( "welcome.features.feature_1.list.2" ) }}
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success me-2" ></i>
                                    {{ __( "welcome.features.feature_1.list.3" ) }}
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Frontend Stack --}}
                    <div class="col-lg-4 col-md-6" >
                        <div class="feature-card p-4 h-100" >
                            <div class="feature-icon" >
                                <i class="fas fa-palette" ></i>
                            </div>
                            <h4 class="fw-bold mb-3 text-lv-dark" >
                                {{ __( "welcome.features.feature_2.title" ) }}
                            </h4>
                            <ul class="list-unstyled" >
                                <li>
                                    <i class="fas fa-check-circle text-success me-2" ></i>
                                    {{ __( "welcome.features.feature_2.list.0" ) }}
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success me-2" ></i>
                                    {{ __( "welcome.features.feature_2.list.1" ) }}
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success me-2" ></i>
                                    {{ __( "welcome.features.feature_2.list.2" ) }}
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Admin Interface --}}
                    <div class="col-lg-4 col-md-6" >
                        <div class="feature-card p-4 h-100" >
                            <div class="feature-icon" >
                                <i class="fas fa-tachometer-alt" ></i>
                            </div>
                            <h4 class="fw-bold mb-3 text-lv-dark" >
                                {{ __( "welcome.features.feature_3.title" ) }}
                            </h4>
                            <ul class="list-unstyled" >
                                <li>
                                    <i class="fas fa-check-circle text-success me-2" ></i>
                                    {{ __( "welcome.features.feature_3.list.0" ) }}
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success me-2" ></i>
                                    {{ __( "welcome.features.feature_3.list.1" ) }}
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success me-2" ></i>
                                    {{ __( "welcome.features.feature_3.list.2" ) }}
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success me-2" ></i>
                                    {{ __( "welcome.features.feature_3.list.3" ) }}
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Code Quality --}}
                    <div class="col-lg-4 col-md-6" >
                        <div class="feature-card p-4 h-100" >
                            <div class="feature-icon" >
                                <i class="fas fa-shield-alt" ></i>
                            </div>
                            <h4 class="fw-bold mb-3 text-lv-dark" >
                                {{ __( "welcome.features.feature_4.title" ) }}
                            </h4>
                            <ul class="list-unstyled" >
                                <li>
                                    <i class="fas fa-check-circle text-success me-2" ></i>
                                    {{ __( "welcome.features.feature_4.list.0" ) }}
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success me-2" ></i>
                                    {{ __( "welcome.features.feature_4.list.1" ) }}
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success me-2" ></i>
                                    {{ __( "welcome.features.feature_4.list.2" ) }}
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success me-2" ></i>
                                    {{ __( "welcome.features.feature_4.list.3" ) }}
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Testing Framework --}}
                    <div class="col-lg-4 col-md-6" >
                        <div class="feature-card p-4 h-100" >
                            <div class="feature-icon" >
                                <i class="fas fa-bug" ></i>
                            </div>
                            <h4 class="fw-bold mb-3 text-lv-dark" >
                                {{ __( "welcome.features.feature_5.title" ) }}
                            </h4>
                            <ul class="list-unstyled" >
                                <li>
                                    <i class="fas fa-check-circle text-success me-2" ></i>
                                    {{ __( "welcome.features.feature_5.list.0" ) }}
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success me-2" ></i>
                                    {{ __( "welcome.features.feature_5.list.1" ) }}
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success me-2" ></i>
                                    {{ __( "welcome.features.feature_5.list.2" ) }}
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success me-2" ></i>
                                    {{ __( "welcome.features.feature_5.list.3" ) }}
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Development Tools --}}
                    <div class="col-lg-4 col-md-6" >
                        <div class="feature-card p-4 h-100" >
                            <div class="feature-icon" >
                                <i class="fas fa-tools" ></i>
                            </div>
                            <h4 class="fw-bold mb-3 text-lv-dark" >
                                {{ __( "welcome.features.feature_6.title" ) }}
                            </h4>
                            <ul class="list-unstyled" >
                                <li>
                                    <i class="fas fa-check-circle text-success me-2" ></i>
                                    {{ __( "welcome.features.feature_6.list.0" ) }}
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success me-2" ></i>
                                    {{ __( "welcome.features.feature_6.list.1" ) }}
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success me-2" ></i>
                                    {{ __( "welcome.features.feature_6.list.2" ) }}
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success me-2" ></i>
                                    {{ __( "welcome.features.feature_6.list.3" ) }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Quick Start Section --}}
        <section class="py-5" >
            <div class="container" >
                <div class="row justify-content-center" >
                    <div class="col-lg-8" >
                        <div class="hero-section p-5 text-center text-white" >
                            <h2 class="display-6 fw-bold mb-4" >
                                {{ __( "welcome.quick.title" ) }}
                            </h2>
                            <div class="row g-2" >
                                <div class="col-md-4" >
                                    <div class="stats-card p-3 h-100 d-flex flex-column justify-content-center" >
                                        <code class="text-white" >
                                            {{ __( "welcome.quick.option_1.code" ) }}
                                        </code>
                                        <small class="d-block mt-2" >
                                            {{ __( "welcome.quick.option_1.small" ) }}
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-4" >
                                    <div class="stats-card p-3 h-100 d-flex flex-column justify-content-center" >
                                        <code class="text-white" >
                                            {{ __( "welcome.quick.option_2.code" ) }}
                                        </code>
                                        <small class="d-block mt-2" >
                                            {{ __( "welcome.quick.option_2.small" ) }}
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-4" >
                                    <div class="stats-card p-3 h-100 d-flex flex-column justify-content-center" >
                                        <code class="text-white" >
                                            {{ __( "welcome.quick.option_3.code" ) }}
                                        </code>
                                        <small class="d-block mt-2" >
                                            {{ __( "welcome.quick.option_3.small" ) }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Footer --}}
        <footer class="py-4 text-center text-white" >
            <div class="container" >
                <div class="row align-items-center" >
                    <div class="col-md-6 text-md-start" >
                        <p class="mb-0" >
                            <strong>Laravel Boilerplate</strong> - Built with ❤️ for developers
                        </p>
                    </div>
                    <div class="col-md-6 text-md-end" >
                        <p class="mb-0" >
                            Laravel v{{ Illuminate\Foundation\Application::VERSION }} | PHP v{{ PHP_VERSION }}
                        </p>
                    </div>
                </div>
            </div>
        </footer>

    </body>
</html>
