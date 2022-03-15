<nav x-data="{ showMobileMenu: false }" x-init="$watch('showMobileMenu', value => {
                        if (value) {
                            document.body.classList.add('overflow-y-hidden');
                        } else {
                            document.body.classList.remove('overflow-y-hidden');
                        }
                    })" x-on:keydown.escape.window="showMobileMenu = false">


    <!-- Primary Navigation Menu -->

    <div class="container mx-auto">
        <div class="hidden sm:block">

            <div class="flex justify-between items-center mt-10">
                <a href="{{ route('home') }}">
                    <h1 class="text-2xl text-gray-800 font-semibold">
                        Selise Assessment
                    </h1>
                </a>

                <div class="flex space-x-4 w-32">
                    <span>
                        @include('navigation.user-menu')
                    </span>

                    <span>
                        @include('navigation.cart-menu')
                    </span>
                </div>
            </div>
        </div>

        <!-- Hamburger -->
        <div class="sm:hidden">
            <div class="flex justify-between items-center">
                <a class="w-24" href="{{ route('home') }}">
                    <img src="{{ asset('images/anonms_logo.png') }}" alt="">
                </a>
                <div class="flex items-center">
                    <button x-on:click="showMobileMenu = ! showMobileMenu"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': showMobileMenu, 'inline-flex': ! showMobileMenu }"
                                class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! showMobileMenu, 'inline-flex': showMobileMenu }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div class="ml-3 relative">
                        {{-- --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="showMobileMenu" class="fixed inset-0 transform transition-all" x-on:click="showMobileMenu = false"
        x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 bg-gray-800 opacity-50"></div>
    </div>
    <div x-show="showMobileMenu" x-transition:enter="transition ease-in-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-x-0 -translate-x-1/2"
        x-transition:enter-end="opacity-100 transform scale-x-100 translate-x-0"
        x-transition:leave="transition ease-in-out duration-300"
        x-transition:leave-start="opacity-100 transform scale-x-100 translate-x-0"
        x-transition:leave-end="opacity-0 transform scale-x-0 -translate-x-1/2"
        class="navbar-menu z-50 fixed inset-0 overflow-y-auto ">

        {{-- <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div> --}}
        <nav @click.away="showMobileMenu = false"
            class="flex flex-col py-6 px-6 bg-white border-r w-11/12 h-screen shadow-lg">
            <div class="flex items-center mb-8">
                <a class="mr-auto text-2xl font-bold leading-none" href="{{ route('home') }}">
                    <h1 class="text-2xl text-gray-800 font-semibold">
                        Selise Assessment
                    </h1>
                </a>
                <button x-on:click="showMobileMenu = false" class="navbar-close">
                    <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div>
                <ul>
                    <li class="mb-1">
                        <a class="block p-3 text-base text-gray-600" href="">Home</a>
                    </li>
                    <li class="mb-1">
                        <a class="block p-3 text-base text-gray-600" href="">Shop</a>
                    </li>
                    <li class="mb-1">
                        <a class="block p-3 text-base text-gray-600" href="">
                            Contact Us
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</nav>
