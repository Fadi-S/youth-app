<x-layout>

    <x-slot name="breadcrumb">
        <x-layout.breadcrumb url="/admins">
            Admins
        </x-layout.breadcrumb>

        <x-layout.breadcrumb :url="'/admins/' . $admin->username">
            {{ $admin->name }}
        </x-layout.breadcrumb>
    </x-slot>

    <main class="bg-white rounded-lg flex-1 relative z-0 overflow-y-auto focus:outline-none xl:order-last" tabindex="0"
          x-data="" x-init="$el.focus()">

        <article>
            <div>
                <div>
                    <img class="w-full object-cover lg:h-64 object-top"
                         src="{{ asset('images/forsan-750.jpg') }}"
                         alt="">
                </div>
                <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                        <div class="flex">
                            <img class="h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32 bg-gray-200"
                                 src="{{ $admin->picture }}" alt="">
                        </div>
                        <div class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                            <div class="sm:hidden 2xl:block mt-6 min-w-0 flex-1">
                                <h1 class="text-2xl font-bold text-gray-900 truncate">
                                    {{ $admin->name }}
                                </h1>
                            </div>
                            <div class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">
                                <a href="{{ url("/admins/$admin->username/edit") }}"
                                   class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                        <path fill-rule="evenodd"
                                              d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span>Edit</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden sm:block 2xl:hidden mt-6 min-w-0 flex-1">
                        <h1 class="text-2xl font-bold text-gray-900 truncate">
                            {{ $admin->name }}
                        </h1>
                    </div>
                </div>
            </div>

            <!-- Tabs -->
            <div class="mt-6 sm:mt-2 2xl:mt-5">
                <div class="border-b border-gray-200">
                    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                            <!-- Current: "border-pink-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                            <a href="#"
                               class="border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                               aria-current="page">
                                Profile
                            </a>
                            <a href="#"
                               class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                Calendar
                            </a>
                            <a href="#"
                               class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                Recognition
                            </a>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Description list -->
            <div class="mt-6 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Phone
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            (555) 123-4567
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Email
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $admin->email }}
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Role
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ ($admin->role) ? $admin->role->name : 'N/A' }}
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Team
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            Product Development
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Location
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            San Francisco
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Sits
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            Oasis, 4th floor
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Salary
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            $145,000
                        </dd>
                    </div>

                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                            Birthday
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            June 8, 1990
                        </dd>
                    </div>

                    <div class="sm:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">
                            About
                        </dt>
                        <dd class="mt-1 max-w-prose text-sm text-gray-900">
                            <p>
                                Tincidunt quam neque in cursus viverra orci, dapibus nec tristique. Nullam ut sit dolor
                                consectetur urna, dui cras nec sed. Cursus risus congue arcu aenean posuere aliquam.
                            </p>
                            <p class="mt-5">
                                Et vivamus lorem pulvinar nascetur non. Pulvinar a sed platea rhoncus ac mauris amet.
                                Urna, sem pretium sit pretium urna, senectus vitae. Scelerisque fermentum, cursus felis
                                dui suspendisse velit pharetra. Augue et duis cursus maecenas eget quam lectus. Accumsan
                                vitae nascetur pharetra rhoncus praesent dictum risus suspendisse.
                            </p>
                        </dd>
                    </div>
                </dl>
            </div>

            <!-- Team member list -->
            <div class="mt-8 max-w-5xl mx-auto px-4 pb-12 sm:px-6 lg:px-8">
                <h2 class="text-sm font-medium text-gray-500">Team members</h2>
                <div class="mt-1 grid grid-cols-1 gap-4 sm:grid-cols-2">

                    <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-pink-500">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full"
                                 src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                 alt="">
                        </div>
                        <div class="flex-1 min-w-0">
                            <a href="#" class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <p class="text-sm font-medium text-gray-900">
                                    Leslie Alexander
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    Co-Founder / CEO
                                </p>
                            </a>
                        </div>
                    </div>

                    <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-pink-500">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full"
                                 src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                 alt="">
                        </div>
                        <div class="flex-1 min-w-0">
                            <a href="#" class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <p class="text-sm font-medium text-gray-900">
                                    Michael Foster
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    Co-Founder / CTO
                                </p>
                            </a>
                        </div>
                    </div>

                    <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-pink-500">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full"
                                 src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                 alt="">
                        </div>
                        <div class="flex-1 min-w-0">
                            <a href="#" class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <p class="text-sm font-medium text-gray-900">
                                    Dries Vincent
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    Manager, Business Relations
                                </p>
                            </a>
                        </div>
                    </div>

                    <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-pink-500">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full"
                                 src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                 alt="">
                        </div>
                        <div class="flex-1 min-w-0">
                            <a href="#" class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <p class="text-sm font-medium text-gray-900">
                                    Lindsay Walton
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    Front-end Developer
                                </p>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </article>
    </main>

</x-layout>