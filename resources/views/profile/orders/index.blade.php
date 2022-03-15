<x-app-layout>
    <div class="container mx-auto py-20">
        <x-card>
            <x-slot name='content'>
                <h1 class="text-lg font-medium text-gray-700">Your Order History</h1>

                @if (count($orders) == 0)

                <div class="px-6 py-20 md:py-48 flex flex-col justify-center items-center ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 text-gray-700" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                    <h1 class="text-gray-600 uppercase tracking-wide mt-6 text-2xl md:text-4xl">Order History Is Empty
                    </h1>
                    <p class="text-gray-500 text-md text-center mt-6">You haven't ordered any products yet.</p>
                    <p class="text-gray-500 text-md text-center mt-2">
                        You can visit our 'Shop' page to find products to order.
                    </p>
                    <x-button.black-link class="mt-6" href="{{ route('home') }}">Return to Shop</x-button.black-link>
                </div>

                @else
                {{-- Orders Table --}}
                <div class=" py-4 overflow-x-auto px-2">
                    <div class="inline-block min-w-full rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="text-left px-5 py-3 border-b-2 border-gray-200 text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                        Order Date
                                    </th>
                                    <th
                                        class="text-left px-5 py-3 border-b-2 border-gray-200 text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                        Billed To
                                    </th>
                                    <th
                                        class="text-left px-5 py-3 border-b-2 border-gray-200 text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                        Total
                                    </th>
                                    <th
                                        class="text-left px-5 py-3 border-b-2 border-gray-200 text-sm font-semibold text-gray-600 uppercase tracking-wider">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                <tr>

                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-sm text-gray-600 whitespace-nowrap">
                                            {{ date(\Carbon\Carbon::parse($order->created_at)->format('Y/m/d')) }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-sm text-gray-600 whitespace-nowrap">
                                            {{ $order->is_billing_different == 0 ? $order->f_name . ' ' .
                                            $order->l_name
                                            : $order->billing->f_name . ' ' . $order->billing->l_name }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-sm text-gray-600 whitespace-nowrap">
                                            ${{ $order->total }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm ">
                                        <div class="flex items-center justify-center">

                                            {{-- View Details button --}}
                                            <x-button.black-link
                                                href="{{ route('profile.orders.show', ['id' => $order->id]) }}">
                                                Details
                                            </x-button.black-link>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class=" py-5 border-gray-200 bg-white text-lg " colspan=" 4">
                                        <div class="flex items-center justify-center">
                                            <p>No orders in history.</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="py-8 px-6">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
                @endif

            </x-slot>
        </x-card>
    </div>
</x-app-layout>
