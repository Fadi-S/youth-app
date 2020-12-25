<div>

    <x-slot name="breadcrumb">
        <x-layout.breadcrumb url="/sections">
            Sections
        </x-layout.breadcrumb>

        @if($isCreate)
            <x-layout.breadcrumb url="/sections/create">
                Add
            </x-layout.breadcrumb>
        @else
            <x-layout.breadcrumb :url="'/sections/' . $section->slug">
                {{ $section->name }}
            </x-layout.breadcrumb>
            <x-layout.breadcrumb :url="'/sections/' . $section->slug . '/edit'">
                Edit
            </x-layout.breadcrumb>
        @endif
    </x-slot>

    <div class="bg-white mb-6">
        <x-layout.wizard.body>
            <x-layout.wizard.step :step="1" :selected="$step">
                Section Details
            </x-layout.wizard.step>

            <x-layout.wizard.step :step="2" :selected="$step">
                Tasks
            </x-layout.wizard.step>

            <x-layout.wizard.step :step="3" :selected="$step" :last="true">
                Preview
            </x-layout.wizard.step>
        </x-layout.wizard.body>
    </div>

    @if(session()->has('success'))
        <x-success>{{ session('success') }}</x-success>
    @endif

    <div class="space-y-6">
        @switch($step)
            @case(1)
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form wire:submit.prevent="save" action="#" method="POST">
                    @csrf

                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-4 gap-6">
                                <div class="col-span-4 md:col-span-2">
                                    <x-layout.form.input wire:model="section.name" required
                                                         type="text" label="Name"
                                                         :error="$errors->first('section.name')"
                                                         name="name" id="name" autocomplete="section-name"/>
                                </div>

                                <div class="col-span-3 sm:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700">
                                        Picture
                                    </label>
                                    <div class="mt-2 flex items-center">
                                        <input wire:model="picture" type="file" accept="image/*" class="sr-only"
                                               id="path">
                                        <label class="text-white px-3 py-2 rounded-md
                                        text-gray-700 bg-gray-300 cursor-pointer hover:bg-gray-400
                                         focus:shadow-outline" for="path">
                                            <div class="flex items-center justify-center">
                                                <x-svg.search wire:loading.remove wire:target="picture" class="mr-3" />

                                                <x-svg.loading wire:loading wire:target="picture" class="mr-3" />
                                                Browse
                                            </div>
                                        </label>
                                    </div>

                                    @error("picture")
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-span-2">
                                    @php($pictureUrl = $picture ? $picture->temporaryUrl() : ($isCreate ? '' : $section->picture))

                                    @if($pictureUrl)
                                        <img src="{{ $pictureUrl }}"
                                             class="p-2 bg-gray-200 rounded-lg w-9/12" alt="Image">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">

                            <x-layout.button type="submit">
                                <x-slot name="svg">
                                    <x-svg.next wire:loading.remove wire:target="save" />

                                    <x-svg.loading wire:loading wire:target="save" />
                                </x-slot>
                                Save
                            </x-layout.button>
                        </div>
                    </div>
                </form>
            </div>
            @break

            @case(2)
            <form method="POST" action="#" wire:submit.prevent="saveTasks">
                @csrf
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                        <h3 class="text-xl text-gray-800 font-semibold">
                            Tasks
                        </h3>

                        <x-layout.button type="button" wire:click="addTask">
                            <x-slot name="svg">
                                <x-svg.add wire:loading.remove wire:target="addTask" />
                                <x-svg.loading wire:loading wire:target="addTask" />
                            </x-slot>

                            Add Task
                        </x-layout.button>

                        <div class="grid gap-4 grid-cols-1">
                            @foreach($tasks as $key => $task)
                                <div class="col-span-1" wire:key="task-{{ $key }}">
                                    <div class="space-x-2 flex items-center w-full">
                                        <div class="w-5/12">
                                            <x-layout.form.input wire:model="tasks.{{$key}}.title" required
                                                                 type="text" label="Task Name"
                                                                 :error="$errors->first('tasks.{{$key}}.title')"
                                                                 name="name" id="task-{{ $key }}-name"
                                                                 autocomplete="task-name"/>
                                        </div>
                                        <div class="w-5/12">
                                            <x-layout.form.input wire:model="tasks.{{$key}}.date" required
                                                                 type="date" label="For Day"
                                                                 :error="$errors->first('tasks.{{$key}}.date')"
                                                                 name="date" id="task-{{ $key }}-date"
                                                                 autocomplete="task-date"/>
                                        </div>

                                        <div class="w-2/12">
                                            <x-layout.button class="mt-6" color="bg-red-500 hover:bg-red-600"
                                                             type="button"
                                                             wire:click="removeTask('{{ $key }}')">
                                                <x-slot name="svg"><x-svg.x /></x-slot>
                                            </x-layout.button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <x-layout.button type="submit">
                            <x-slot name="svg">
                                <x-svg.next wire:loading.remove wire:target="saveTasks" />
                                <x-svg.loading wire:loading wire:target="saveTasks" />
                            </x-slot>

                            Save
                        </x-layout.button>

                    </div>
                </div>
            </form>

            @break

            @case(3)
            <div class="bg-white">
                Nice!
            </div>
            @break
        @endswitch
    </div>
</div>

