<x-admin-layout>
    <x-slot name="title" >
        {{ __( "Safe Area" ) }}
    </x-slot>

    {{-- Content Header (Page header) --}}
    <div class="app-content-header" >
        <div class="container-fluid" >
            <div class="row" >
                <div class="col-12" >
                    <h3 class="mb-0" >
                        {{ __( "Safe Area" ) }}
                    </h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Main content --}}
    <div class="app-content" >
        <div class="container-fluid" >
            <div class="row justify-content-center" >
                <div class="col-12 col-md-8 col-lg-6" >
                    <div class="card shadow-sm rounded bg-white border-0" >
                        <div class="card-body text-success" >
                            {{ __( "This is a safe area!" ) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
