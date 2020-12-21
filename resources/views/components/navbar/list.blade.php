<button class="flex items-center pt-2 bg-opacity-25 text-gray-100 w-full focus:outline-none
 group flex items-center text-sm font-medium rounded-md overflow-hidden"
        :class="isOpen ? 'bg-indigo-400 text-white shadow-inner' : 'text-indigo-100'"
        type="button"
        x-data="{isOpen: false, id: Math.random()}"
        @click="isOpen = !isOpen; if(isOpen) $dispatch('close-all', { except: id });">

    <div class="flex-col w-full">
        <div class="justify-between flex w-full px-2 py-2">
            <div class="flex items-center">

                <div class="mr-3 h-6 w-6 text-indigo-300">
                    {{ $svg }}
                </div>

                {{ $label }}
            </div>

            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 :class="isOpen ? 'transition duration-300 transform rotate-90' : 'transition duration-300 transform '"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </div>

        <div @close-all.window="isOpen=$event.detail.except == id" x-show="isOpen" style="display: none;"
             x-transition:enter="transition transform duration-150"
             x-transition:enter-start="scale-75 opacity-0"
             x-transition:enter-end="scale-100 opacity-100"
             class="mt-1 w-full">
            {{ $slot }}
        </div>
    </div>
</button>