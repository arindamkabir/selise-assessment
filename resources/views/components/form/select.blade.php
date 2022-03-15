@props([
'placeholder' => 'Regular Select',
'disabled' => false,
'data'
])

<div class="relative inline-block w-full text-gray-500">
    <select {{ $attributes->merge(['class' => 'w-full text-xs tracking-wide py-2 px-3 border border-gray-300
        focus:border-blue-500 focus:ring-0 focus:outline-none rounded-sm appearance-none shadow-sm']) }}
        placeholder="{{ $placeholder }}" @if($disabled) disabled @endif>
        <option value="">{{ $placeholder }}</option>
        @foreach ($data as $value => $label)
        <option value="{{$value}}">{{$label}}</option>
        @endforeach
    </select>
    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
    </div>
</div>
