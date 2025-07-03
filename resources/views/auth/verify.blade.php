<x-guest-layout>
    <div class="mb-3 small text-secondary" >
        <p class="mb-0" >
            {{ __("Thanks for signing up!" ) }}
        </p>
        <p class="mb-0" >
            {{ __("Before getting started, could you verify your email address by clicking on the link we just emailed to you?" ) }}
        </p>
        <p class="mb-0" >
            {{ __("If you didn't receive the email, we will gladly send you another." ) }}
        </p>
    </div>

    @if ( session( "status" ) == "verification-link-sent" )
        <div class="mb-3 fw-medium small text-success" >
            {{ __( "A new verification link has been sent to the email address you provided during registration." ) }}
        </div>
    @endif

    <div x-data="{ loading: false }" class="mt-3 d-flex flex-column align-items-center justify-content-between" >
        <form method="POST" action="{{ route( "verification.send" ) }}" @submit="loading = true" >
            @csrf

            <div>
                <x-buttons.primary x-bind:disabled="loading" >
                    <span :class="!loading ? '' : 'd-none'" >
                        {{ __( "Resend Verification Email" ) }}
                    </span>
                    <span :class="loading ? 'spinner-border spinner-border-sm' : 'd-none'" role="status" aria-hidden="true" ></span>
                </x-buttons.primary>
            </div>
        </form>

        <form method="POST" action="{{ route( "logout" ) }}" >
            @csrf

            <button type="submit" class="btn btn-link mt-3 p-0 align-baseline small text-secondary" >
                {{ __( "Log Out" ) }}
            </button>
        </form>
    </div>
</x-guest-layout>
