@props([
'placeholder' => 'Regular Select',
'disabled' => false
])

<div class="relative inline-block w-full text-gray-500">
    <select
        class="w-full text-xs tracking-wide py-2 px-3 border border-gray-300 focus:border-blue-500 focus:ring-0 focus:outline-none rounded-sm appearance-none shadow-sm"
        placeholder="{{ $placeholder }}" {{ $attributes->wire('model') }} @if($disabled) disabled @endif>
        {{ $slot }}
    </select>
    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
    </div>
</div>
