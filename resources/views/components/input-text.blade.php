@props( [ "disabled" => false ] )

<input @disabled( $disabled ) {{
    $attributes->merge( [
        "class"        => "form-control",
        "placeholder"  => "",
        "autocomplete" => "off",
        "autofocus"    => false,
        "required"     => false,
        "name"         => "",
    ] )
}} >
