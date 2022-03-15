<x-app-layout>
    <div class="container mx-auto">
        <div class="flex flex-col-reverse md:flex-row md:space-x-10">
            <div class="w-full md:w-2/3 md:mb-0">
                <h2 class="text-xl tracking-wide text-primary-darker font-medium mb-8">Billing Address</h2>
                <form action="{{ route('checkout.place_order') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="space-y-2">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <x-form.label>First Name</x-form.label>
                                <x-form.input.text placeholder='First Name' name='f_name' value="{{ old('f_name') }}">
                                </x-form.input.text>
                                <x-form.error for='f_name'></x-form.error>
                            </div>
                            <div class="space-y-2">
                                <x-form.label>Last Name</x-form.label>
                                <x-form.input.text placeholder='Last Name' name='l_name' value="{{ old('l_name') }}">
                                </x-form.input.text>
                                <x-form.error for='l_name'></x-form.error>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <x-form.label>Phone</x-form.label>
                        <x-form.input.text placeholder='Phone' name='phone' value="{{ old('phone') }}">
                        </x-form.input.text>
                        <x-form.error for='phone'></x-form.error>
                    </div>

                    <div class="space-y-2">
                        <x-form.label>Address</x-form.label>
                        <x-form.input.text placeholder='Address' name='line1' value="{{ old('line1') }}">
                        </x-form.input.text>
                        <x-form.error for='line1'></x-form.error>
                    </div>

                    <div class="space-y-2">
                        <x-form.label>Address 2 (optional)</x-form.label>
                        <x-form.input.text placeholder='Address 2 (optional)' name='line2' value="{{ old('line2') }}">
                        </x-form.input.text>
                        <x-form.error for='line2'></x-form.error>
                    </div>

                    <div class="space-y-2">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <x-form.label>Town/City</x-form.label>
                                <x-form.input.text placeholder='Town/City' name='city' value="{{ old('city') }}">
                                </x-form.input.text>
                                <x-form.error for='city'></x-form.error>
                            </div>
                            <div class="space-y-2">
                                <x-form.label>Zip Code</x-form.label>
                                <x-form.input.text placeholder='Zip Code' name='zip_code' value="{{ old('zip_code') }}">
                                </x-form.input.text>
                                <x-form.error for='zip_code'></x-form.error>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4 flex justify-between items-center">
                        <a href="{{ route('cart') }}"
                            class="inline-flex items-center text-xs text-gray-600 hover:text-primary-lighter font-medium cursor-pointer">
                            <span class="mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                                </svg>
                            </span>
                            Back To Cart
                        </a>

                        <x-button.black type="submit">
                            Checkout
                        </x-button.black>
                    </div>
                </form>
            </div>

            <div class="w-full md:w-1/3 mb-6 md:mb-0">
                <div>
                    <h2 class="text-xl tracking-wide text-primary-darker font-medium mb-8">Shopping Cart</h2>
                    <div class="border-b border-gray-200">
                        @forelse(Cart::content() as $item)
                        <div class="flex items-center pb-2">
                            <div class="flex w-20 justify-left border-2 border-gray-400 rounded-md relative">
                                <span
                                    class="flex items-center justify-center absolute -right-2 -top-2 rounded-lg py-0.5 px-1 m-0 text-white text-xxs text-center bg-primary-darker group-hover:bg-sky-800 shadow-lg">
                                    {{ $item->qty }}
                                </span>
                                <img src="{{ $item->model->image_url }}" alt="">
                            </div>
                            <div class="ml-4 flex-col justify-center items-center w-2/3">

                                <div class="flex flex-col justify-between flex-grow">
                                    <span class="text-gray-500 text-xs  py-1">{{ $item->model->name }}</span>
                                    <div class="flex space-x-3">
                                        <span class="text-gray-600 text-xs font-medium py-1">
                                            ${{ $item->price }}
                                        </span>
                                    </div>

                                </div>
                            </div>

                        </div>
                        @empty
                        <div class="flex flex-col items-center justify-center hover:bg-gray-100 px-6 py-5 border-b">
                            <h1 class="text-lg text-gray-800 font-medium">No Items in Cart</h1>
                            <a class="mt-3 border-2 border-blue-400 text-blue-400 font-medium hover:bg-blue-400 focus:bg-blue-400 hover:text-white focus:text-white p-2 text-xs transition ease-linear duration-200 rounded-md"
                                href="{{ route('home') }}">Shop Now</a>
                        </div>
                        @endforelse
                    </div>
                    <div class="pb-2">
                        <div class="flex justify-between mt-3">
                            <span class="text-gray-700 text-xs font-medium">Subtotal:</span>
                            <span class="text-primary font-medium text-xs">
                                ${{session()->get('checkout')['subtotal']}}
                            </span>
                        </div>
                        <div class="border-t mt-6">
                            <div class="flex font-medium justify-between py-4 text-xs">
                                <span class="text-primary-darker text-sm font-medium">Total:</span>
                                <span class="text-primary font-medium text-sm">
                                    ${{session()->get('checkout')['total']}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
