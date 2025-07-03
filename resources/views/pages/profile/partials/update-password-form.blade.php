<section>
    <header>
        <h2 class="h5 fw-medium text-dark mb-2" >
            {{ __( "Update Password" ) }}
        </h2>

        <p class="mb-2 small text-secondary" >
            {{ __( "Ensure your account is using a long, random password to stay secure." ) }}
        </p>
    </header>

    <div x-data="{ loading: false }" >
        <form method="post" action="{{ route( "password.update" ) }}" class="mt-4" @submit="loading = true" >
            @csrf
            @method( "put" )

            <div class="mb-3" >
                <x-input-label for="update_password_current_password" :value="__( 'Current Password' )" />
                <x-input-text id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="off" />
                <x-input-error :messages="$errors->updatePassword->get( 'current_password' )" class="mt-2" />
            </div>

            <div class="mb-3" >
                <x-input-label for="update_password_password" :value="__( 'New Password' )" />
                <x-input-text id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get( 'password' )" class="mt-2" />
            </div>

            <div class="mb-3" >
                <x-input-label for="update_password_password_confirmation" :value="__( 'Confirm Password' )" />
                <x-input-text id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get( 'password_confirmation' )" class="mt-2" />
            </div>

            <div class="d-flex align-items-center gap-2" >
                <x-buttons.primary x-bind:disabled="loading" >
                    <span :class="!loading ? '' : 'd-none'" >
                        {{ __( "Save" ) }}
                    </span>
                    <span :class="loading ? 'spinner-border spinner-border-sm' : 'd-none'" role="status" aria-hidden="true" ></span>
                </x-buttons.primary>

                @if ( session( "status" ) === "password-updated" )
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="small text-secondary mb-0" >
                        {{ __( "Saved." ) }}
                    </p>
                @endif
            </div>
        </form>
    </div>
</section>
