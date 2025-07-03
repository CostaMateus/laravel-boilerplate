<x-guest-layout>
    <div x-data="{ loading: false }" >
        <form method="POST" action="{{ route( "password.store" ) }}" @submit="loading = true" >
            @csrf

            {{-- Password Reset Token --}}
            <input type="hidden" name="token" value="{{ $request->route( "token" ) }}" >

            {{-- Email Address --}}
            <div class="mb-3" >
                <x-input-label for="email" :value="__( 'Email' )" />
                <x-input-text id="email" class="form-control" type="email" name="email" :value="old( 'email', $request->email )" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get( 'email' )" class="mb-2" />
            </div>

            {{-- Password --}}
            <div class="mb-3" >
                <x-input-label for="password" :value="__( 'Password' )" />
                <x-input-text id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get( 'password' )" class="mb-2" />
            </div>

            {{-- Confirm Password --}}
            <div class="mb-3" >
                <x-input-label for="password_confirmation" :value="__( 'Confirm Password' )" />
                <x-input-text id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get( 'password_confirmation' )" class="mb-2" />
            </div>

            <div class="d-flex align-items-center justify-content-end mt-3" >
                <x-buttons.primary x-bind:disabled="loading" >
                    <span :class="!loading ? '' : 'd-none'" >
                        {{ __( "Reset Password" ) }}
                    </span>
                    <span :class="loading ? 'spinner-border spinner-border-sm' : 'd-none'" role="status" aria-hidden="true" ></span>
                </x-buttons.primary>
            </div>
        </form>
    </div>
</x-guest-layout>
