<x-layout>
    <x-slot name="head">Dashboard</x-slot>

    <div>
        <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Total Subscribers
                            </dt>
                            <dd class="flex items-baseline">
                                <div class="text-2xl font-semibold text-gray-900">
                                    71,897
                                </div>

                                <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                    <svg class="self-center flex-shrink-0 h-5 w-5 text-green-500" fill="currentColor"
                                         viewBox="0 0 20 20" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                    <span class="sr-only">
                                      Increased by
                                    </span>
                                    122
                                </div>
                            </dd>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-4 sm:px-6">
                    <div class="text-sm">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> View all<span
                                    class="sr-only"> Total Subscribers stats</span></a>
                    </div>
                </div>
            </div>

            <x-layout.details title="Tasks" id="tasks" :number="\App\Models\Task::count()">
                <x-slot name="svg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                    </svg>
                </x-slot>
            </x-layout.details>

            <x-layout.details title="Total Users" id="total-users" :number="\App\Models\User::count()" :growth="-13">
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
        </dl>
    </div>

</x-layout>