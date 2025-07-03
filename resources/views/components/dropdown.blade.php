@props( [
    "align" => "right",
    "width" => "auto",
    "contentClasses" => "py-1 bg-white"
] )

@php
    $alignmentClasses = match ( $align )
    {
        "left" => "start-0",
        "top" => "",
        default => "end-0",
    };

    $width = match ( $width )
    {
        "48" => "dropdown-menu-end",
        default => "",
    };
@endphp

<div class="position-relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false" >
    <div @click="open = ! open" >
        {{ $trigger }}
    </div>

    <div x-show="open" class="dropdown-menu show mt-2 {{ $width }} {{ $alignmentClasses }} shadow rounded border-0" style="display: none; min-width: 10rem;" @click="open = false" >
        <div class="{{ $contentClasses }}" >
            {{ $content }}
        </div>
    </div>
</div>
