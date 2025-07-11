@props( [ "messages" ] )

@if ( $messages )
    <ul {{ $attributes->merge( [ "class" => "small text-danger mb-1 list-unstyled" ] ) }} >
        @foreach ( (array) $messages as $message )
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
