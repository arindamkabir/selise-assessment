<div x-data="{
        messages: [],
        remove(message) {
            this.messages.splice(this.messages.indexOf(message), 1)
        },
    }"
    @notify.window="let message = $event.detail; messages.push(message); setTimeout(() => { remove(message) }, 3500)"
    class="fixed inset-0 top-24 flex flex-col items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:justify-start space-y-4">
    <template x-for="(message, messageIndex) in messages" :key="messageIndex" hidden>
        <div x-transition:enter="transform ease-out duration-300 transition"
            x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            :class="{'border-green-400' : message.type === 'success' || message.type === 'cart-success', 'border-red-400' : message.type === 'warning' || message.type === 'cart-failed', 'border-yellow-400' : message.type === 'deleted', 'border-blue-500' : message.type === 'new_notif'}"
            class="max-w-sm w-full bg-gray-50 shadow-lg rounded-sm pointer-events-auto border-l-4">
            <div class="rounded-lg shadow-xs overflow-hidden">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">

                            <template x-if="message.type === 'success'">
                                <svg class="h-5 w-5 text-green-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </template>

                            <template x-if="message.type === 'cart-success'">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </template>

                            <template x-if="message.type === 'deleted'">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                    </path>
                                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                    <line x1="12" y1="11" x2="12" y2="14"></line>
                                </svg>
                            </template>

                            <template x-if="message.type === 'cart-failed'">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </template>

                            <template x-if="message.type === 'warning'">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </template>

                            <template x-if="message.type === 'new_notif'">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6">
                                    </path>
                                    <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                                </svg>
                            </template>

                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p x-text="message.message" class="text-xs font-medium text-gray-700"></p>
                            <template x-if="message.type === 'cart-success'">
                                <a href="{{ route('cart') }}"
                                    class="text-xs leading-5 font-medium text-sky-600 hover:text-sky-600-light">
                                    To view your cart, click here.
                                </a>
                            </template>
                        </div>
                        <div class="ml-4 flex-shrink-0 flex">
                            <button @click="remove(message)"
                                class="inline-flex text-gray-400 focus:outline-none hover:text-red-600 focus:text-red-600 transition ease-in-out duration-150">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>
