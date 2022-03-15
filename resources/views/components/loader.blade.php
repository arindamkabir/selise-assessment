@props([
'color' => '#0d3b66',
'small' => null,
])

<div style="color: {{ $color }}" class="la-ball-clip-rotate @if ($small) la-sm @endif">
    <div></div>
</div>
