@props([
    'title',
    'id',
    'number',
    'growth' => null,
])

<div class="bg-white overflow-hidden shadow rounded-lg">
    <div class="px-4 py-5 sm:p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                {{ $svg }}
            </div>
            <div class="ml-5 w-0 flex-1">
                <dt class="text-sm font-medium text-gray-500 truncate">
                    {{ $title }}
                </dt>
                <dd class="flex items-baseline">
                    <div class="text-2xl font-semibold text-gray-900">
                        {{ $number }}
                    </div>

                    @isset($growth)
                        <div class="ml-2 flex items-baseline text-sm font-semibold {{ ($growth < 0) ? 'text-red-600' : 'text-green-600' }}">
                            @if($growth < 0)
                                <svg class="self-center flex-shrink-0 h-5 w-5 text-red-500" fill="currentColor"
                                     viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z"
                                          clip-rule="evenodd"/>
                                </svg>
                            @else
                                <svg class="self-center flex-shrink-0 h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 7l4-4m0 0l4 4m-4-4v18"></path>
                                </svg>
                            @endif
                            {{ abs($growth) }}%
                        </div>
                    @endisset
                </dd>
            </div>
        </div>
    </div>
    @isset($details)
        <div class="bg-gray-50 px-4 py-4 sm:px-6">
            <div class="text-sm" x-data="{}">
                <button @click="$dispatch('open{{$id}}');"
                        class="focus:outline-none font-medium text-indigo-600 hover:text-indigo-500">
                    View details
                </button>
            </div>
        </div>

        <x-layout.sidepanel :id="$id" :title="$title">
            {{ $details }}
        </x-layout.sidepanel>
    @endisset
</div>