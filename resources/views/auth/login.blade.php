<x-guest-layout>
    {{-- Session Status --}}
    <x-auth-session-status class="mb-4" :status="session( 'status' )" />

    <div x-data="{ loading: false }" >
        <form method="POST" action="{{ route( "login" ) }}" @submit="loading = true" >
            @csrf

            {{-- Email Address --}}
            <div class="mb-3" >
                <x-input-label for="email" :value="__( 'Email' )" />
                <x-input-text id="email" class="form-control" type="email" name="email" :value="old( 'email' )" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get( 'email' )" class="mb-2" />
            </div>

            {{-- Password --}}
            <div class="mb-3" >
                <x-input-label for="password" :value="__( 'Password' )" />
                <x-input-text id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get( 'password' )" class="mb-2" />
            </div>

            {{-- Remember Me --}}
            <div class="form-check mb-3" >
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember" >
                <label for="remember_me" class="form-check-label small text-secondary ms-2" >{{ __( "Remember me" ) }}</label>
            </div>

            <div class="d-flex align-items-center justify-content-end mt-3" >
                @if ( Route::has( "password.request" ) )
                    <a class="btn btn-link p-0 align-baseline small text-secondary me-3" href="{{ route( "password.request" ) }}" >
                        {{ __( "Forgot your password?" ) }}
                    </a>
                @endif

                <x-buttons.primary x-bind:disabled="loading" >
                    <span :class="!loading ? '' : 'd-none'" >
                        {{ __( "Log in" ) }}
                    </span>
                    <span :class="loading ? 'spinner-border spinner-border-sm' : 'd-none'" role="status" aria-hidden="true" ></span>
                </x-buttons.primary>
            </div>
        </form>
    </div>
</x-guest-layout>
