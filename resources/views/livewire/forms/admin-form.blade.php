<div class="mt-5 md:mt-0 md:col-span-2">
    @if(session()->has('success'))
    <x-success>{{ session('success') }}</x-success>
    @endif

    <form action="#" method="POST" wire:submit.prevent="save">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <x-layout.form.input wire:model="admin.name"
                                             type="text" label="Name" :error="$errors->first('admin.name')"
                                             name="name" id="name" autocomplete="name" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-layout.form.input wire:model="admin.username"
                                             type="text" label="Username" :error="$errors->first('admin.username')"
                                             name="username" id="username" autocomplete="new-username" />
                        </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-layout.form.input wire:model.lazy="admin.email"
                                             type="email" label="Email address" :error="$errors->first('admin.email')"
                                             name="email" id="email" autocomplete="email" />
                        </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-layout.form.input wire:model.lazy="password"
                                             type="password" label="Password" :error="$errors->first('password')"
                                             name="password" id="password" autocomplete="new-password" />
                        </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-layout.form.select wire:model="role_id" id="role_id" name="role_id" label="Role"
                                              :error="$errors->first('role_id')">
                            <option value="0">-</option>
                            @foreach($roles as $id => $role)
                                <option value="{{ $id }}">{{ $role }}</option>
                            @endforeach
                        </x-layout.form.select>
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg wire:loading.remove wire:target="save" class="-ml-1 mr-3 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>

                    <svg wire:loading wire:target="save" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Save
                </button>
            </div>
        </div>
    </form>
</div>