@props(['size'])

@php
$size = [
'sm' => 'h-4 w-4',
'md' => 'h-6 w-6',
'lg' => 'h-8 w-8',
][$size ?? 'sm'];
@endphp

<svg xmlns="http://www.w3.org/2000/svg" class="{{ $size }}" fill="currentColor" viewBox="0 0 256 256">
    <rect width="256" height="256" fill="none"></rect>
    <circle cx="116" cy="116" r="84" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
        stroke-width="16"></circle>
    <line x1="175.4" y1="175.4" x2="224" y2="224" fill="none" stroke="currentColor" stroke-linecap="round"
        stroke-linejoin="round" stroke-width="16"></line>
</svg>
