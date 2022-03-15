<div class="h-full">
    <div class="h-full flex items-center" x-data="{ searchBarOpen: false }" @click.away="searchBarOpen = false"
        @close.stop="searchBarOpen = false">
        <div @click="searchBarOpen = ! searchBarOpen">
            <div class="font-sans block lg:inline-block align-middle  ">
                <button class="relative flex text-black hover:text-gray-400">
                    <x-icon.search size="lg" />
                </button>
            </div>
        </div>

        <div x-show="searchBarOpen" x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-1" class="absolute inset-x-0 transform -mt-1.5 z-10 ">
            <div class="bg-white border-t border-black mt-40">
                <div class="container mx-auto py-4">
                    <div class="flex justify-between items-center w-full">
                        <div class="flex w-full items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-black" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <input type="text"
                                class="h-10 w-full text-sm text-black py-2 pl-4 pr-28 border-none focus:ring-0 rounded-none appearance-none tracking-wide uppercase placeholder:text-black"
                                placeholder="Search" wire:model.defer="searchQuery" wire:keydown.enter="search">
                        </div>
                        <span class="text-black hover:text-primary-lighter" @click="searchBarOpen = false">
                            <x-icon.close />
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
