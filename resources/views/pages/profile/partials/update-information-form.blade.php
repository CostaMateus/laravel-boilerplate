<section>
    <header>
        <h2 class="h5 fw-medium text-dark mb-2" >
            {{ __( "Profile Information" ) }}
        </h2>

        <p class="mb-2 small text-secondary" >
            {{ __( "Update your account's profile information and email address." ) }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route( "verification.send" ) }}" >
        @csrf
    </form>

    <div x-data="{ loading: false }" >
        <form method="post" action="{{ route( "profile.update" ) }}" class="mt-4" @submit="loading = true" >
            @csrf
            @method( "patch" )

            <div class="mb-3" >
                <x-input-label for="name" :value="__( 'Name' )" />
                <x-input-text id="name" name="name" type="text" class="form-control" :value="old( 'name', $user->name )" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get( 'name' )" />
            </div>

            <div class="mb-3" >
                <x-input-label for="email" :value="__( 'Email' )" />
                <x-input-text id="email" name="email" type="email" class="form-control" :value="old( 'email', $user->email )" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get( 'email' )" />

                @if ( $user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail() )
                    <div>
                        <p class="small mt-2 text-dark" >
                            {{ __( "Your email address is unverified." ) }}

                            <button form="send-verification" class="btn btn-link p-0 align-baseline small text-secondary" >
                                {{ __( "Click here to re-send the verification email." ) }}
                            </button>
                        </p>

                        @if ( session( "status" ) === "verification-link-sent" )
                            <p class="mt-2 fw-medium small text-success" >
                                {{ __( "A new verification link has been sent to your email address." ) }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="d-flex align-items-center gap-2" >
                <x-buttons.primary x-bind:disabled="loading" >
                    <span :class="!loading ? '' : 'd-none'" >
                        {{ __( "Save" ) }}
                    </span>
                    <span :class="loading ? 'spinner-border spinner-border-sm' : 'd-none'" role="status" aria-hidden="true" ></span>
                </x-buttons.primary>

                @if ( session( "status" ) === "profile-updated" )
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="small text-secondary mb-0" >
                        {{ __( "Saved." ) }}
                    </p>
                @endif
            </div>
        </form>
    </div>
</section>
