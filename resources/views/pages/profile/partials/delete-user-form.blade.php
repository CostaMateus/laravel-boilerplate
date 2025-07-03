<section>
    <header>
        <h2 class="h5 fw-medium text-dark mb-2" >
            {{ __( "Delete Account" ) }}
        </h2>

        <p class="mb-2 small text-secondary" >
            {{ __("Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain." ) }}
        </p>
    </header>

    <x-buttons.danger x-data="" x-on:click.prevent="$dispatch( 'open-modal', 'confirm-user-deletion' )" >
        {{ __( "Delete Account" ) }}
    </x-buttons.danger>

    <x-modal max-width="md" name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable >
        <div x-data="{ loading: false }" >
            <form method="post" action="{{ route( "profile.destroy" ) }}" @submit="loading = true" >
                @csrf
                @method( "delete" )

                <h2 class="h5 fw-medium text-dark mb-2" >
                    {{ __( "Are you sure you want to delete your account?" ) }}
                </h2>

                <p class="mb-2 small text-secondary" >
                    {{ __( "Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account." ) }}
                </p>

                <div class="mb-3" >
                    <x-input-label for="password" :value="__( 'Password' )" class="visually-hidden" />
                    <x-input-text id="password" name="password" type="password" class="form-control" :placeholder="__( 'Password' )" />
                    <x-input-error :messages="$errors->userDeletion->get( 'password' )" class="mt-2" />
                </div>

                <div class="d-flex justify-content-end gap-2" >
                    <x-buttons.secondary x-on:click="$dispatch( 'close' )" >
                        {{ __( "Cancel" ) }}
                    </x-buttons.secondary>

                    <x-buttons.danger class="ms-2" x-bind:disabled="loading" >
                        <span :class="!loading ? '' : 'd-none'" >
                            {{ __( "Delete Account" ) }}
                        </span>
                        <span :class="loading ? 'spinner-border spinner-border-sm' : 'd-none'" role="status" aria-hidden="true" ></span>
                    </x-buttons.danger>
                </div>
            </form>
        </div>
    </x-modal>
</section>
