@props([
'label', 'url'
])

<a class="flex items-center text-sm font-semibold
        text-indigo-100 hover:bg-indigo-200 py-3
        bg-opacity-25 {{ url($url) == url()->current() ? 'bg-indigo-200' : '' }}
        hover:bg-opacity-25" href="{{ url($url) }}">
    {{ $slot }}

    <span class="mx-3">{{ $label }}</span>
</a>
