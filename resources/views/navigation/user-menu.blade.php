<div>
    @guest
    <a href="{{route('login')}}" class="cursor-pointer relative pt-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="#000000" viewBox="0 0 256 256">
            <rect width="256" height="256" fill="none"></rect>
            <circle cx="128" cy="96" r="64" fill="none" stroke="#000000" stroke-miterlimit="10" stroke-width="16">
            </circle>
            <path d="M31,216a112,112,0,0,1,194,0" fill="none" stroke="#000000" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="16"></path>
        </svg>
    </a>
    @else
    <div class="relative">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <span class="inline-flex justify-center items-center rounded-md group">
                    <button type="button" class="inline-flex items-center focus:outline-none pt-1">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="#000000" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none"></rect>
                            <circle cx="128" cy="96" r="64" fill="none" stroke="#000000" stroke-miterlimit="10"
                                stroke-width="16"></circle>
                            <path d="M31,216a112,112,0,0,1,194,0" fill="none" stroke="#000000" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="16"></path>
                        </svg>


                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            class="-mr-0.5 h-5 w-5 text-primary-darker group-hover:text-primary group-focus:text-primary-lighter transition"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </span>
            </x-slot>

            <x-slot name="content">
                <!-- Account Management -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Manage Account') }}
                </div>

                <x-dropdown.link href="{{ route('profile.show') }}">
                    {{ __('Profile') }}
                </x-dropdown.link>



                <x-dropdown.link href="{{ route('profile.orders') }}">
                    {{ __('Order History') }}
                </x-dropdown.link>


                <div class="border-t border-gray-100"></div>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown.link href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown.link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
    @endguest
</div>
