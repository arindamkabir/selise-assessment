<div class="flex flex-col items-center">
    <a href="{{ route('product.show', ['slug' => $product->slug]) }}">
        <div class="w-full">
            <img src="{{ $product->image_url }}" alt="">
        </div>
    </a>
    <h4 class="text-sm tracking-widest font-semibold uppercase mt-4">{{ $product->title }}</h4>
    <h4 class="text-sm tracking-widest uppercase mt-3">${{ $product->price }}</h4>

    {{-- Add to Cart Button --}}
    <x-button.black class="mt-6" wire:click="addToCart">
        <span class="mr-1" wire:loading.delay wire:target="addToCart">
            <x-loader small color="white" />
        </span>
        <span class="whitespace-nowrap">Add to Cart</span>
    </x-button.black>
</div>
