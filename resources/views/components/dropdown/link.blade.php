@php
$classes = $active ?? false ?'flex items-center px-4 py-2 bg-gray-50 text-xs font-medium tracking-wider leading-5
text-gray-500 bg-white border-r-4 border-sky-800 transition w-full cursor-pointer' : 'flex items-center px-4 py-2
text-xs font-medium tracking-wider leading-5 text-gray-500 focus:text-white border-r-4 border-transparent
hover:border-sky-800 hover:bg-gray-50 focus:border-sky-800 bg-white focus:outline-none focus:bg-sky-800 transition
w-full cursor-pointer';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
