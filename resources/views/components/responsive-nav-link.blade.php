@props( [ "active" ] )

@php
    $classes = ( $active ?? false )
        ? "nav-link active ps-3 pe-4 py-2 border-start border-4 border-primary text-base fw-medium bg-light"
        : "nav-link ps-3 pe-4 py-2 border-start border-4 border-transparent text-base fw-medium text-secondary bg-white";
@endphp

<a {{ $attributes->merge( [ "class" => $classes ] ) }} >
    {{ $slot }}
</a>
