<x-guest-layout>
    <div class="mb-3 small text-secondary" >
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <div x-data="{ loading: false }" >
        <form method="POST" action="{{ route( "password.confirm" ) }}" @submit="loading = true" >
            @csrf

            {{-- Password --}}
            <div class="mb-3" >
                <x-input-label for="password" :value="__( 'Password' )" />
                <x-input-text id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get( 'password' )" class="mb-2" />
            </div>

            <div class="d-flex justify-content-end mt-3" >
                <x-buttons.primary x-bind:disabled="loading" >
                    <span :class="!loading ? '' : 'd-none'" >
                        {{ __( "Confirm" ) }}
                    </span>
                    <span :class="loading ? 'spinner-border spinner-border-sm' : 'd-none'" role="status" aria-hidden="true" ></span>
                </x-buttons.primary>
            </div>
        </form>
    </div>
</x-guest-layout>
