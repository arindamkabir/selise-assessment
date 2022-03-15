<a {{ $attributes->merge(['class' => 'inline-flex flex-col py-2 px-2 lg:px-4 justify-center
    items-center font-bold text-xs tracking-widest uppercase text-black hover:text-white focus:text-white border-2
    appearance-none cursor-pointer whitespace-nowrap shadow-sm bg-white hover:bg-black focus:bg-black border-black
    hover:border-black focus:border-black transition duration-200']) }}>
    {{ $slot }}
</a>
