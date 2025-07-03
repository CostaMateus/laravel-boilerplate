<p {{ $attributes->merge( [ "class" => "small text-muted mb-0" ] ) }} >
    &copy; {{ date( "Y" ) }}
    {{ config( "app.name", "Laravel Boilerplate"  )}} -
    {{ __( "All rights reserved" ) }}
</p>
