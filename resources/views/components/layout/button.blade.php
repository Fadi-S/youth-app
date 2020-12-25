@props([
    'class' => null,
    'color' => 'bg-indigo-600 hover:bg-indigo-700',
])

<button {{ $attributes }} class="inline-flex
 justify-center {{ ($slot->toHtml()) ? 'py-2 px-4' : 'p-2' }} border border-transparent
                         shadow-sm text-sm font-medium rounded-md text-white
                         {{ $color }} focus:outline-none {{ $class }}
                         focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

    @isset($svg)
        <div class="{{ ($slot->toHtml()) ? '-ml-1 mr-3' : '' }}">
            {{ $svg }}
        </div>
    @endisset

    {{ $slot }}
</button>