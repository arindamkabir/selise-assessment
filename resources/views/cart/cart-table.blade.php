<div class="px-2 sm:px-4 md:px-8 lg:px-12 xl:px-16 max-w-5xl mx-auto my-10">
    {{-- If cart empty --}}
    @if (Cart::count() === 0)
    <div class="px-6 py-20 md:py-48 flex flex-col justify-center items-center ">

        <h1 class="text-black uppercase tracking-wide mt-6 text-2xl md:text-4xl">Cart Is Empty</h1>
        <p class="text-black text-sm text-center mt-6">
            You don't have any products in the cart yet.
        </p>
        <p class="text-black text-sm text-center mt-2">
            You can visit our 'Shop' page to find products to add to your cart.
        </p>
        <x-button.black-link class="mt-8" size="sm" href="{{ route('home') }}">
            Return to Shop
        </x-button.black-link>
    </div>

    @else

    {{-- If cart not empty --}}
    <div class="flex flex-col items-center justify-center">
        <h2 class="text-gray-700 text-xl font-bold mb-4 tracking-widest uppercase mt-4">
            Your Cart
        </h2>
    </div>

    {{-- Cart Table --}}
    <div class="w-full py-6">

        {{-- Cart Error --}}
        @if (session()->has('cart_error'))
        <x-alert type="danger" message="{{session('cart_error')}}" />
        @endif

        <div class="flex justify-between mt-10 px-2 py-3 border-b">
            <h3 class="font-semibold text-black text-sm uppercase text-left">Products</h3>
            <h3 class="font-semibold text-black text-sm uppercase text-left">{{ Cart::count() }} items</h3>
        </div>

        @foreach(Cart::content() as $item)
        @php
        $model = $item->model;
        @endphp
        <div
            class="flex flex-row justify-between lg:justify-start lg:items-center px-2 py-2 border-b border-gray-200 w-full">

            <div class="flex lg:w-1/2">
                <img class="w-32" src="{{ $model->image_url }}" alt="">
                <div class="ml-5 flex flex-col justify-start items-start space-y-2">
                    <span class="font-medium text-sm uppercase">
                        <a href="{{ route('product.show', ['slug' => $model->slug]) }}">
                            {{ $model->title }}
                        </a>
                    </span>

                    <span class="text-center tracking-wide text-xs text-black select-none">
                        Price :
                        <span class="text-black uppercase">${{ $item->price }}</span>
                    </span>

                    <span class="text-right text-xs font-medium text-sky-900 select-none">
                        Total :
                        <span class="text-black uppercase">${{ $item->total }}</span>
                    </span>

                    <div class="flex lg:hidden items-center px-2 rounded-md">
                        <button class="cursor-pointer" wire:click.prevent="decreaseQty('{{ $item->rowId }}')"
                            wire:loading.attr="disabled" wire:target="increaseQty, decreaseQty">
                            <x-icon.minus class=" h-5 w-5" />
                        </button>

                        <input
                            class="mx-2 text-xs border-none text-center w-14 select-none py-1 lg:py-2 focus:outline-none focus:ring-0 focus:border-0"
                            type="text" value="{{ $item->qty }}" disabled>

                        <button class="cursor-pointer" wire:click.prevent="increaseQty('{{ $item->rowId }}')"
                            wire:loading.attr="disabled" wire:target="increaseQty, decreaseQty">
                            <x-icon.plus class=" h-5 w-5" />
                        </button>
                    </div>
                </div>
            </div>
            <div class="hidden lg:flex lg:justify-center lg:items-center lg:w-2/6">
                <div class="flex items-center px-2 rounded-md">
                    <button class="cursor-pointer" wire:click.prevent="decreaseQty('{{ $item->rowId }}')"
                        wire:loading.attr="disabled" wire:target="increaseQty, decreaseQty">
                        <x-icon.minus class=" h-5 w-5" />
                    </button>

                    <input
                        class="mx-2 text-xs border-none text-center w-14 select-none py-1 lg:py-2 focus:outline-none focus:ring-0 focus:border-0"
                        type="text" value="{{ $item->qty }}" disabled>

                    <button class="cursor-pointer" wire:click.prevent="increaseQty('{{ $item->rowId }}')"
                        wire:loading.attr="disabled" wire:target="increaseQty, decreaseQty">
                        <x-icon.plus class=" h-5 w-5" />
                    </button>
                </div>
            </div>
            <div class="flex ml-2 lg:w-1/6 justify-end">
                <button wire:click.prevent="removeItem('{{ $item->rowId }}')"
                    class="font-semibold hover:text-red-500 text-gray-700 focus:outline-none">
                    <x-icon.trash class="h-5 w-5" />
                </button>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Cart Total and go to checkout section --}}
    <div class="flex flex-col md:flex-row justify-center md:justify-end pt-10">
        <div class="md:w-1/2">
            <div class="flex flex-col items-center md:items-end md:pr-6">
                <div class="mb-3">
                    <div class="flex justify-between">
                        <span class="tracking-wider font-semibold text-base uppercase text-black">Subtotal:</span>
                        <span class="ml-4 font-semibold text-base text-black tracking-wide">
                            ${{ Cart::subtotal() }}
                        </span>
                    </div>
                </div>
                <label class="inline-flex items-start justify-end my-3">
                    <input type="checkbox"
                        class="form-checkbox h-4 w-4 text-black border-gray-400 focus:ring-0 text-xs md:text-sm"
                        wire:model="terms_checkbox">
                    <span class="ml-2 text-black text-xs tracking-wide xl:whitespace-nowrap">
                        I agree with the terms and conditions, privacy policy and the refund policy.
                    </span>
                </label>
                <x-form.error for="terms_checkbox" />
                <x-button.black class="mt-6" wire:click="goToCheckout">Go To
                    Checkout
                </x-button.black>
            </div>
        </div>
    </div>
    @endif
</div>
