<button {{ $attributes->merge([' type'=> 'submit', 'class' => 'inline-flex flex-col py-2 px-2 lg:px-4 justify-center
    items-center font-bold text-xs tracking-widest text-black border appearance-none cursor-pointer
    whitespace-nowrap shadow-sm bg-white hover:bg-white focus:bg-white border-white hover:border-white
    focus:border-white transition duration-200']) }}>
    {{ $slot }}
</button>
