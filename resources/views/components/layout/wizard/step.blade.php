@props([
    'step',
    'selected',
    'last' => false,
])

<li class="relative md:flex-1 md:flex">
    <a href="#" wire:click.prevent="$set('step', {{ $step }})" class="group flex items-center w-full">
        <span class="px-6 py-4 flex items-center text-sm font-medium">
          <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center
          rounded-full
          {{ $selected == $step ? 'border-2 border-indigo-600' : '' }}
            {{ $selected > $step ? 'group-hover:bg-indigo-800 bg-indigo-600' : '' }}
          {{ $step > $selected ? 'group-hover:border-gray-400 border-2 border-gray-300' : '' }}">
             @if($selected > $step)
                  <x-svg.check />
             @else
                  <span class="{{ ($selected == $step) ? 'text-indigo-600' : 'text-gray-500 group-hover:text-gray-900' }}">
                      0{{ $step }}
                  </span>
             @endif
          </span>
          <span class="ml-4 text-sm font-medium text-gray-900">{{ $slot }}</span>
        </span>
    </a>

    @if(!$last)
        <div class="hidden md:block absolute top-0 right-0 h-full w-5" aria-hidden="true">
            <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
            </svg>
        </div>
    @endif
</li>