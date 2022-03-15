<x-app-layout>
    <div class="max-w-lg mx-auto py-12 lg:py-32">
        <x-card>
            <x-slot name="content">
                <div class="flex justify-center mb-2 lg:mb-5">
                    <span class="text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 lg:h-16 lg:w-16" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                </div>
                <h1 class="text-2xl lg:text-4xl text-gray-700 tracking-widest font-medium text-center">Thank You.
                </h1>
                <p class="text-sm lg:text-base text-gray-600 text-center lg:leading-7 mt-2 lg:mt-5">Your order has
                    been
                    received.
                <div class="flex justify-center items-center mt-6">
                    <x-button.black-link href="{{ route('profile.orders.show', ['id' => $order->id]) }}" size="sm">
                        View Order
                    </x-button.black-link>
                </div>
            </x-slot>
        </x-card>
    </div>
</x-app-layout>
