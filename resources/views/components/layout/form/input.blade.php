@props([
    'label' => null,
    'id' => rand(100, 999),
    'error' => null,
])

<label for="{{ $id }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
<div class="mt-1 relative rounded-md shadow-sm">
    <input {{ $attributes }} id="{{ $id }}"
           class="mt-1 {{ $error ? 'ring-red-400 ring-1' : 'focus:ring-indigo-500' }}
                   block w-full shadow-sm sm:text-sm border-gray-300 focus:outline-none rounded-md">
    @if($error)
        <x-svg.field-error />
    @endif
</div>
@if($error)
<p class="mt-2 text-sm text-red-600">{{ $error }}</p>
@endif