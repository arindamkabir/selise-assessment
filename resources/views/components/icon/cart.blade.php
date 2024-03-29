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
    <circle cx="80" cy="216" r="16"></circle>
    <circle cx="184" cy="216" r="16"></circle>
    <path
        d="M42.3,72H221.7l-26.4,92.4A15.9,15.9,0,0,1,179.9,176H84.1a15.9,15.9,0,0,1-15.4-11.6L32.5,37.8A8,8,0,0,0,24.8,32H8"
        fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16">
    </path>
</svg>
