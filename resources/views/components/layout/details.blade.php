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
                        @unless($growth == 0)
                            <div class="ml-2 flex items-baseline text-sm font-semibold {{ ($growth < 0) ? 'text-red-600' : 'text-green-600' }}">
                                @if($growth < 0)
                                    <x-svg.arrow-down-circle class="text-red-500" />
                                @else
                                    <x-svg.arrow-up-circle class="text-green-500" />
                                @endif
                                {{ abs($growth) }}%
                            </div>
                        @endunless
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