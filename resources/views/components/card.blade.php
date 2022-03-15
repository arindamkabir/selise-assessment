<div {{ $attributes->merge(['class' => 'bg-white shadow-lg overflow-hidden sm:rounded-lg border border-gray-100
    py-6'])}}>
    @if (isset($header))
    <div class="px-8 py-4">
        {{ $header }}
    </div>
    @endif
    <div class="px-8 pb-6">
        {{ $content }}
    </div>
</div>