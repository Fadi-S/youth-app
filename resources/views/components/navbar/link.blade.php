@props([
    'url',
    'class' => null,
])

<a {{ $attributes }} href="{{ url($url) }}"
   class="{{ $class }} {{ url($url) == url()->current() ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-600' }}
           text-indigo-100 hover:bg-indigo-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md">

    @isset($svg)
        <div class="mr-3 h-6 w-6 text-indigo-300">
            {{ $svg }}
        </div>
    @endisset

    {{ $slot }}
</a>