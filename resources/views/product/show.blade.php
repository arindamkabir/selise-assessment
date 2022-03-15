<x-app-layout>
    <div class="container mx-auto my-16">
        <div class="md:flex md:space-x-8 my-5">
            {{-- Products Images Div --}}
            <div class="w-full md:w-1/3 mb-10 md:mb-0 ">
                <div class="relative">
                    <img src="{{ $product->image_url }}" class="" alt="{{ $product->title }}" />
                </div>
            </div>
            {{-- Products Details Div --}}
            <div class="w-full md:w-2/3">
                <div class="flex flex-col items-start justify-start w-full">
                    <div class="mb-6 w-full">
                        <h1 class="font-medium text-gray-600 text-lg mb-3 tracking-wider uppercase">
                            {{ $product->title }}
                        </h1>

                        <div
                            class="w-full flex justify-between items-end mb-5 pb-2 border-b border-gray-200 tracking-wider">
                            <h1 class="text-gray-800 text-2xl">${{ $product->price }}</h1>
                        </div>
                        <div class="text-xs leading-5">{{ $product->description }}</div>
                    </div>

                    {{-- Add to Cart Button --}}
                    @livewire('product.add-to-cart-button', ['product' => $product ])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
