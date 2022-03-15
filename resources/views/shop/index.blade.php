<x-app-layout>
    <div class="container mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-6 lg:gap-8">
            @forelse ($products as $product)
            @livewire('shop.product-card', ['product' => $product], key($product->slug))
            @empty
            <div class="col-span-full">
                <h1 class="text-center text-black font-semibold text-lg">
                    No Products Found.
                </h1>
            </div>
            @endforelse
        </div>

        <div class="py-8 px-6">
            {{ $products->links() }}
        </div>
    </div>

</x-app-layout>
