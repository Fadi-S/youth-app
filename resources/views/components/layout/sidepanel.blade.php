@props([
    'id',
    'title' => null,
])
<div x-data="{ open: false }">
    <div x-show="open" style="display:none;"
         x-transition:enter="transition-opacity duration-400 sm:duration-500"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity duration-500 sm:duration-650"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-20">
        <div class="absolute inset-0 bg-black opacity-50"></div>
    </div>

    <div @keydown.window.escape="open = false;"
         {{ "@open$id.window=open=true;" }} class="fixed inset-0 z-50 overflow-hidden"
         x-show="open" style="display: none;"
         x-transition:enter="transform transition duration-500"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transform transition duration-300 sm:duration-500"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full">
        <div class="absolute inset-0 overflow-hidden">
            <section @click.away="open = false;" class="absolute inset-y-0 right-0 pl-10 max-w-full flex"
                     aria-labelledby="slide-over-heading">
                <div class="w-screen max-w-md" x-description="Slide-over panel, show/hide based on slide-over state."
                >
                    <div class="h-full divide-y divide-gray-200 flex flex-col bg-white shadow-xl">
                        <div class="min-h-0 flex-1 flex flex-col py-6 overflow-y-scroll">
                            <div class="px-4 sm:px-6">
                                <div class="flex items-start justify-between">
                                    <h2 id="slide-over-heading" class="text-lg font-medium text-gray-900">
                                        {{ $title }}
                                    </h2>
                                    <div class="ml-3 h-7 flex items-center">
                                        <button @click="open = false;"
                                                class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                            <span class="sr-only">Close panel</span>
                                            <svg class="h-6 w-6" x-description="Heroicon name: x"
                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 relative flex-1 px-4 sm:px-6">
                                {{ $slot }}
                            </div>
                        </div>
                        <div class="flex-shrink-0 px-4 py-4 flex justify-end">
                            <button @click="open = false;" type="button"
                                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
