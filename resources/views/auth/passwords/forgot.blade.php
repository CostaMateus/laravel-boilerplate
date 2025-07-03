<x-guest-layout>
    <div class="mb-3 small text-secondary" >
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    {{-- Session Status --}}
    <x-auth-session-status class="mb-4" :status="session( 'status' )" />

    <div x-data="{ loading: false }" >
        <form method="POST" action="{{ route( 'password.email' ) }}" @submit="loading = true" >
            @csrf

            {{-- Email Address --}}
            <div class="mb-3" >
                <x-input-label for="email" :value="__( 'Email' )" />
                <x-input-text id="email" class="form-control" type="email" name="email" :value="old( 'email' )" required autofocus />
                <x-input-error :messages="$errors->get( 'email' )" class="mb-2" />
            </div>

            <div class="d-flex align-items-center justify-content-end mt-3" >
                <x-buttons.primary x-bind:disabled="loading" >
                    <span :class="!loading ? '' : 'd-none'" >
                        {{ __( "Email Password Reset Link" ) }}
                    </span>
                    <span :class="loading ? 'spinner-border spinner-border-sm' : 'd-none'" role="status" aria-hidden="true" ></span>
                </x-buttons.primary>
            </div>
        </form>
    </div>
</x-guest-layout>
