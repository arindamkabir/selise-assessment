@props([
'label',
'for',
'error' => false,
'helpText' => false,
'required' => false,
])

<div>
    <label for="{{ $for }}" class='block font-semibold text-xs text-gray-500 tracking-wide'>
        {{ $label }}@if($required)<strong class="text-red-400"> *</strong>@endif
    </label>
    <div class="mt-2">
        {{ $slot }}
    </div>

    @if($error)
    <div class="mt-2">
        @error($error)
        <p class='text-xs text-red-600'>{{ $message }}</p>
        @enderror
    </div>
    @endif

    @if ($helpText)
    <p class="mt-2 text-xs text-gray-500">{{ $helpText }}</p>
    @endif
</div>