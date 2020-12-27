<x-layout>
    <x-slot name="head">Dashboard</x-slot>

    <div>
        <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
            <x-layout.details title="Total Admins" id="total-admins" :number="\App\Models\Admin::count()" :growth="0">
                <x-slot name="details">
                    <ul class="divide-y divide-gray-200 overflow-y-auto">
                        @foreach(\App\Models\Admin::latest()->limit(10)->get() as $admin)
                            <li class="px-6 py-5 relative">
                                <div class="group flex justify-between items-center">
                                    <a href="{{ url("admins/$admin->username") }}" class="-m-1 p-1 block">
                                        <div class="absolute inset-0 group-hover:bg-gray-50" aria-hidden="true"></div>
                                        <div class="flex-1 flex items-center min-w-0 relative">
                                            <span class="flex-shrink-0 inline-block relative">
                                              <img class="h-10 w-10 rounded-full bg-gray-200"
                                                   src="{{ $admin->picture }}"
                                                   alt="">
                                            </span>
                                            <div class="ml-4 truncate">
                                                <p class="text-sm font-medium text-gray-900 truncate">{{ $admin->name }}</p>
                                                <p class="text-sm text-gray-500 truncate">{{ '@' . $admin->username }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </x-slot>

                <x-slot name="svg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                    </svg>
                </x-slot>
            </x-layout.details>

            <x-layout.details title="Total Users" id="total-users" :number="\App\Models\User::count()" :growth="0">
                <x-slot name="details">
                    <ul class="divide-y divide-gray-200 overflow-y-auto">
                        @foreach(\App\Models\User::latest()->limit(10)->get() as $user)
                            <li class="px-6 py-5 relative">
                                <div class="group flex justify-between items-center">
                                    <a href="{{ url("users/$user->username") }}" class="-m-1 p-1 block">
                                        <div class="absolute inset-0 group-hover:bg-gray-50" aria-hidden="true"></div>
                                        <div class="flex-1 flex items-center min-w-0 relative">
                                            <span class="flex-shrink-0 inline-block relative">
                                              <img class="h-10 w-10 rounded-full bg-gray-200"
                                                   src="{{ $user->picture }}"
                                                   alt="">
                                            </span>
                                            <div class="ml-4 truncate">
                                                <p class="text-sm font-medium text-gray-900 truncate">{{ $user->name }}</p>
                                                <p class="text-sm text-gray-500 truncate">{{ '@' . $user->username }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </x-slot>

                <x-slot name="svg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </x-slot>
            </x-layout.details>

            <x-layout.details title="Tasks" id="tasks" :number="\App\Models\Task::count()">
                <x-slot name="svg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                    </svg>
                </x-slot>
            </x-layout.details>
        </dl>
    </div>

</x-layout>