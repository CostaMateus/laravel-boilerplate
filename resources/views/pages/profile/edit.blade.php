<x-admin-layout>
    <x-slot name="title" >
        {{ __( "Profile" ) }}
    </x-slot>

    {{-- Content Header (Page header) --}}
    <div class="app-content-header" >
        <div class="container-fluid" >
            <div class="row" >
                <div class="col-12" >
                    <h3 class="mb-0" >
                        {{ __( "Profile" ) }}
                    </h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Main content --}}
    <div class="app-content" >
        <div class="container-fluid" >
            <div class="row justify-content-center gy-4" >
                <div class="col-12 col-md-8 col-lg-6" >
                    <div class="card mb-4" >
                        <div class="card-body" >
                            @include( "pages.profile.partials.update-information-form" )
                        </div>
                    </div>

                    <div class="card mb-4" >
                        <div class="card-body" >
                            @include( "pages.profile.partials.update-password-form" )
                        </div>
                    </div>

                    <div class="card" >
                        <div class="card-body" >
                            @include( "pages.profile.partials.delete-user-form" )
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
