@props( [ "active" ] )

@php
    $classes = ( $active ?? false )
        ? "nav-link active border-bottom border-primary px-1 pt-1 small fw-medium text-dark"
        : "nav-link border-bottom border-transparent px-1 pt-1 small fw-medium text-secondary";
@endphp

<a {{ $attributes->merge( [ "class" => $classes ] ) }} >
    {{ $slot }}
</a>
