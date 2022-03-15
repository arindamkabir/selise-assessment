<x-app-layout>
    <div class="container mx-auto py-20">
        <x-card>
            <x-slot name='content'>
                <h1 class="text-lg font-medium text-gray-700">Order Number - {{ $order->id }}</h1>

                <div class="px-2 pb-6">

                    <h4 class="text-lg pb-2 font-medium text-gray-600 my-4">
                        Ordered Products :
                    </h4>
                    <div class=" overflow-x-auto">
                        <div class="inline-block min-w-full rounded-lg overflow-hidden">
                            <table class="min-w-full leading-normal">
                                <thead>
                                    <tr>
                                        <th
                                            class="pl-2 py-2 border-b border-gray-200 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                            Image
                                        </th>
                                        <th
                                            class="px-3 py-2 border-b border-gray-200 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th
                                            class="px-3 py-2 border-b border-gray-200 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                            Price
                                        </th>
                                        <th
                                            class="px-3 py-2 border-b border-gray-200 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->order_items as $item)
                                    <tr class="border-b border-gray-100">
                                        <td class="pl-2 py-2 bg-white text-sm">
                                            <img class="max-w-[80px] md:max-w-[100px] lg:max-w-[120px]"
                                                src="{{ $item->product->image_url }}" alt="img product" />
                                        </td>
                                        <td class="px-3 py-2 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-nowrap text-left">
                                                {{ $item->product->name }} x <strong>{{ $item->quantity }}</strong>
                                            </p>
                                        </td>
                                        <td class="px-3 py-2 bg-white text-sm ">
                                            <p class="text-gray-900 whitespace-nowrap text-left">
                                                ${{ $item->price }}
                                            </p>
                                        </td>
                                        <td class="px-3 py-2 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-nowrap text-left">
                                                ${{ $item->price * $item->quantity }}
                                            </p>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr class="">
                                        <td colspan="2"></td>
                                        <td class="px-3 pt-4 pb-2 bg-white text-sm">
                                            <p class="text-gray-900 font-semibold whitespace-nowrap text-left">
                                                Subtotal:
                                            </p>
                                        </td>
                                        <td class="px-3 pt-4 pb-2 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-nowrap text-left">
                                                ${{ $order->subtotal }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="2"></td>
                                        <td class="px-3 py-2 bg-white text-sm">
                                            <p class="text-gray-900 font-semibold whitespace-nowrap text-left">
                                                Total:
                                            </p>
                                        </td>
                                        <td class="px-3 py-2 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-nowrap text-left">
                                                ${{ $order->total }}
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="my-6">
                        <h4 class="text-lg font-medium text-gray-600 mb-6">
                            Order Summary :
                        </h4>


                        {{-- Shipping and Billing Details --}}
                        <div class="flex flex-col md:flex-row md:space-x-5 items-start">
                            <div class="w-full md:w-1/2 space-y-3">
                                <h4 class="text-left pb-2 font-semibold text-gray-800 text-base">Shipping Details :</h4>
                                <div class="flex space-x-3">
                                    <p class="text-sm font-semibold text-gray-600 w-1/3 whitespace-nowrap leading-6">
                                        Name:</p>
                                    <p class="text-sm text-gray-600 w-2/3 leading-6">
                                        {{ $order->f_name }} {{ $order->l_name }}
                                    </p>
                                </div>
                                <div class="flex space-x-3">
                                    <p class="text-sm font-semibold text-gray-600 w-1/3 whitespace-nowrap leading-6">
                                        Phone:</p>
                                    <p class="text-sm text-gray-600 w-2/3 leading-6">
                                        {{ $order->phone }}
                                    </p>
                                </div>
                                <div class="flex space-x-3">
                                    <p class="text-sm font-semibold text-gray-600 w-1/3 whitespace-nowrap leading-6">
                                        Email:</p>
                                    <p class="text-sm text-gray-600 w-2/3 leading-6">
                                        {{ $order->user->email }}
                                    </p>
                                </div>
                                <div class="flex space-x-3">
                                    <p class="text-sm font-semibold text-gray-600 w-1/3 whitespace-nowrap leading-6">
                                        Address:</p>
                                    <p class="text-sm text-gray-600 w-2/3 leading-6">
                                        {{ $order->shipping_address }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-slot>
        </x-card>
    </div>
</x-app-layout>
