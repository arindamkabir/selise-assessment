<input type="number" {!! $attributes->merge(['class' => 'w-full text-xs text-gray-500 tracking-wide py-2 px-3 border
border-gray-300
focus:border-sky-500 focus:ring-0 focus:outline-none rounded-sm appearance-none shadow-sm']) !!}>

@once
@push('styles')
{{-- Styles to remove the input arrows --}}
<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
@endpush
@endonce
