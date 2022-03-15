@props([
'type' => 'text',
])

<input type="{{$type}}" {!! $attributes->merge(['class' => 'w-full text-xs text-gray-500 tracking-wide py-2 px-3 border
border-gray-300
focus:border-sky-500 focus:ring-0 focus:outline-none rounded-sm appearance-none shadow-sm']) !!}>
