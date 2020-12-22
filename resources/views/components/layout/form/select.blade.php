@props([
    'label' => null,
    'id' => rand(100, 999),
    'error' => null,
])

<label for="{{ $id }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
<div class="mt-1 relative rounded-md shadow-sm">
    <select {{ $attributes }} id="{{ $id }}" class="mt-1 block w-full py-2 px-3 border
    {{ $error ? 'ring-red-400 ring-1' : 'focus:ring-indigo-500' }}
    border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        {{ $slot }}
    </select>
    @if($error)
        <x-svg.field-error />
    @endif
</div>
@if($error)
    <p class="mt-2 text-sm text-red-600">{{ $error }}</p>
@endif