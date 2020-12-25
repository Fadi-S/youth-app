<x-base>
    <div class="h-screen flex overflow-hidden bg-gray-100" x-data="{ sidebarOpen: false }"
         @keydown.window.escape="sidebarOpen = false">
        <div x-show="sidebarOpen" class="md:hidden"
             x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state."
             style="display: none;">
            <div class="fixed inset-0 flex z-40">
                <div @click="sidebarOpen = false" x-show="sidebarOpen"
                     x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state."
                     x-transition:enter="transition-opacity ease-linear duration-300"
                     x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                     x-transition:leave="transition-opacity ease-linear duration-300"
                     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0"
                     aria-hidden="true" style="display: none;">
                    <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
                </div>
                <div x-show="sidebarOpen" x-description="Off-canvas menu, show/hide based on off-canvas menu state."
                     x-transition:enter="transition ease-in-out duration-300 transform"
                     x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                     x-transition:leave="transition ease-in-out duration-300 transform"
                     x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                     class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-indigo-700"
                     style="display: none;">
                    <div class="absolute top-0 right-0 -mr-12 pt-2">
                        <button x-show="sidebarOpen" @click="sidebarOpen = false"
                                class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                                style="display: none;">
                            <span class="sr-only">Close sidebar</span>
                            <svg class="h-6 w-6 text-white" x-description="Heroicon name: x"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex-shrink-0 flex items-center px-4 space-x-6">
                        <x-logo class="w-64" />
                        <span class="text-indigo-200 font-semibold text-lg">Youth Meeting</span>
                    </div>
                    <div class="mt-5 flex-1 h-0 overflow-y-auto">
                        <x-navbar.nav />
                    </div>
                </div>
                <div class="flex-shrink-0 w-14" aria-hidden="true"></div>
            </div>
        </div>

        <div class="hidden bg-indigo-700 md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
                <div class="flex flex-col flex-grow pt-5 pb-4 overflow-y-auto">
                    <div class="flex items-center flex-shrink-0 px-4 space-x-6">
                        <x-logo class="w-64" />
                        <span class="text-indigo-200 font-semibold text-lg">Youth Meeting</span>
                    </div>
                    <div class="mt-5 flex-1 flex flex-col">
                        <x-navbar.nav />
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <div class="relative z-10 flex-shrink-0 flex h-16 bg-white shadow">
                <button @click.stop="sidebarOpen = true"
                        class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="h-6 w-6" x-description="Heroicon name: menu-alt-2" xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h7"></path>
                    </svg>
                </button>
                <div class="flex-1 px-4 flex justify-between">
                    <div class="flex-1 flex">
                        <form class="w-full flex md:ml-0" action="#" method="GET">
                            <label for="search_field" class="sr-only">Search</label>
                            <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                                    <x-svg.search />
                                </div>
                                <input id="search_field"
                                       class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-0 focus:border-transparent sm:text-sm"
                                       placeholder="Search" type="search" name="search">
                            </div>
                        </form>
                    </div>
                    <div class="ml-4 flex items-center md:ml-6">
                        <div @click.away="open = false" class="ml-3 relative" x-data="{ open: false }">
                            <div>
                                <button @click="open = !open"
                                        class="max-w-xs bg-white flex items-center p-1 text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        id="user-menu" aria-haspopup="true" x-bind:aria-expanded="open">
                                    <span class="sr-only">Open user menu</span>
                                    <span class="text-sm text-gray-500 font-normal">{{ auth()->user()->name }}</span>
                                    <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->picture }}" alt="">
                                </button>
                            </div>
                            <div x-show="open"
                                 x-description="Profile dropdown panel, show/hide based on dropdown state."
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5"
                                 role="menu" aria-orientation="vertical" aria-labelledby="user-menu"
                                 style="display: none;">

                                <a href="{{ url('/profile') }}"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your
                                    Profile</a>

                                <form method="POST" action="{{ url('logout') }}">
                                    @csrf
                                    <button type="submit"
                                            class="w-full flex items-start block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                            role="menuitem">
                                        Sign out
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <main class="flex-1 relative overflow-y-auto focus:outline-none" tabindex="0" x-data=""
                  x-init="$el.focus()">
                <div class="py-6 space-y-4">

                    @isset($breadcrumb)
                    <div class="mx-6">
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="bg-white rounded-md shadow px-6 flex space-x-4">
                                <li class="flex">
                                    <div class="flex items-center">
                                        <a href="{{ url('/') }}" class="text-gray-400 hover:text-gray-500">
                                            <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                                            </svg>
                                            <span class="sr-only">Home</span>
                                        </a>
                                    </div>
                                </li>
                                {{ $breadcrumb }}
                            </ol>
                        </nav>
                    </div>
                    @endisset

                    @isset($head)
                        <div class="mx-auto px-4 sm:px-6 md:px-8">
                            <h1 class="text-2xl font-semibold text-gray-900">{{ $head }}</h1>
                        </div>
                    @endisset
                    <div class="mx-auto px-4 sm:px-6 md:px-8">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </div>

</x-base>