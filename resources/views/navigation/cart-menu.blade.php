<nav x-data="{ showCartMenu: false }" x-on:open-cart.window="showCartMenu = true" x-init="$watch('showCartMenu', value => {
                        if (value) {
                            document.body.classList.add('overflow-y-hidden');
                        } else {
                            document.body.classList.remove('overflow-y-hidden');
                        }
                    })" x-on:keydown.escape.window="showCartMenu = false">


    <div class="group">
        <div @click="showCartMenu = ! showCartMenu">
            <button>
                <span class="text-black hover:text-gray-400">
                    <x-icon.cart size="lg" />
                </span>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="showCartMenu" class="fixed inset-0 transform transition-all z-40" x-on:click="showCartMenu = false"
        x-transition:enter="ease-out duration-500" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-500"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 bg-white opacity-80"></div>
    </div>
    <div x-show="showCartMenu" x-transition:enter="transition ease-in duration-500"
        x-transition:enter-start="opacity-0 transform translate-x-1/2"
        x-transition:enter-end="opacity-100 transform translate-x-100"
        x-transition:leave="transition ease-out duration-500"
        x-transition:leave-start="opacity-100 transform  translate-x-100"
        x-transition:leave-end="opacity-0 transform translate-x-1/2"
        class="z-50 fixed inset-0 flex justify-end h-screen">

        {{-- <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div> --}}
        <nav @click.away="showCartMenu = false"
            class="flex flex-col justify-between py-6 px-6 lg:py-10 lg:px-8 bg-white border-r w-full sm:max-w-sm max-h-screen shadow-lg overflow-y-auto">
            <div>
                <div class="flex items-center mb-6 lg:mb-10 pb-4 border-b border-gray-200">
                    <a class="mr-auto text-xl font-semibold uppercase tracking-wider" href="{{ route('home') }}">
                        Your Cart
                    </a>
                    <a x-on:click="showCartMenu = false" class="focus:ring-0 focus:border-none">
                        <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-black"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </a>
                </div>
                <div>
                    @forelse(Cart::content() as $item)
                    <div class="border-b border-gray-100 py-3" wire:key="cart-item-{{ $item->model->slug }}">
                        <div class="flex pb-2">
                            <div class="w-1/3">
                                <img class="w-full" src="{{ $item->model->image_url }}" alt="{{ $item->model->title }}">
                            </div>
                            <div class="ml-3 w-2/3 flex flex-col">

                                <div class="flex flex-col justify-between flex-grow space-y-2">
                                    <span class="text-black text-xs font-medium tracking-wider uppercase">
                                        <a href="{{ route('product.show', ['slug' => $item->model->slug]) }}">
                                            {{ $item->model->title }}
                                        </a>
                                    </span>

                                    <span class="text-black text-sm font-medium">
                                        ${{ $item->price }}
                                    </span>

                                    <div class="flex items-center">
                                        <div class="flex items-center px-2">
                                            <button class="cursor-pointer"
                                                wire:click.prevent="decreaseQty('{{ $item->rowId }}')"
                                                wire:loading.attr="disabled">
                                                <x-icon.minus class="text-sky-900 hover:text-sky-600 h-4 w-4" />
                                            </button>

                                            <input
                                                class="mx-2 text-xs border-none text-center w-14 select-none py-1 lg:py-2 focus:outline-none focus:ring-0 focus:border-0"
                                                type="text" value="{{ $item->qty }}" disabled>

                                            <button class="cursor-pointer"
                                                wire:click.prevent="increaseQty('{{ $item->rowId }}')"
                                                wire:loading.attr="disabled">
                                                <x-icon.plus class="text-sky-900 hover:text-sky-600 h-4 w-4" />
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="py-3 flex justify-center items-center">
                        <p class="text-gray-700 text-sm lg:text-base uppercase tracking-wider">Your Cart Is Empty.</p>
                    </div>
                    @endforelse
                </div>
            </div>

            <a href="{{ route('cart') }}" role="button"
                class="mt-6 w-full px-4 py-2 md:py-2 border-2 border-black rounded-sm font-semibold text-xs md:text-sm text-center text-primary-darker hover:text-white uppercase tracking-widest hover:bg-black hover:shadow-md  focus:outline-none focus:bg-black focus:ring focus:ring-gray-300 disabled:opacity-25 transition shadow-sm">
                Go To Cart
            </a>
        </nav>
    </div>
</nav>
