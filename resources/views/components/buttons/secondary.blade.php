<button {{ $attributes->merge( [ "type" => "button", "class" => "btn btn-sm btn-outline-secondary" ] ) }} >
    {{ $slot }}
</button>
