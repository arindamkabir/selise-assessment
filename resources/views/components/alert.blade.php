@props([
'type',
'message'
])

<div class="bg-red-50 border-2 border-red-200 flex space-x-4 p-4 rounded-md shadow-sm">
    <span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
    </span>
    <p class="text-xs font-normal text-gray-700 leading-5">{{$message}}</p>
</div>