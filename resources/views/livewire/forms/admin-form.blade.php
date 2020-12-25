<div class="mt-5 md:mt-0 md:col-span-2">
    <x-slot name="breadcrumb">
        <x-layout.breadcrumb url="/admins">
            Admins
        </x-layout.breadcrumb>

        @if($isCreate)
            <x-layout.breadcrumb url="/admins/create">
                Add
            </x-layout.breadcrumb>
        @else
            <x-layout.breadcrumb :url="'/admins/' . $admin->username">
                {{ $admin->name }}
            </x-layout.breadcrumb>
            <x-layout.breadcrumb :url="'/admins/' . $admin->username . '/edit'">
                Edit
            </x-layout.breadcrumb>
        @endif
    </x-slot>

    @if(session()->has('success'))
    <x-success>{{ session('success') }}</x-success>
    @endif

    <form action="#" method="POST" wire:submit.prevent="save">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <x-layout.form.input wire:model="admin.name" required
                                             type="text" label="Name" :error="$errors->first('admin.name')"
                                             name="name" id="name" autocomplete="name" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-layout.form.input wire:model="admin.username" required
                                             type="text" label="Username" :error="$errors->first('admin.username')"
                                             name="username" id="username" autocomplete="new-username" />
                        </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-layout.form.input wire:model.lazy="admin.email" required
                                             type="email" label="Email address" :error="$errors->first('admin.email')"
                                             name="email" id="email" autocomplete="email" />
                        </div>

                    <div class="col-span-6 sm:col-span-3">
                        <x-layout.form.input wire:model.lazy="password" required
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
            <div class="px-4 py-3 bg-gray-50 text-center md:text-right sm:px-6">
                <x-layout.button type="submit">
                    <x-slot name="svg">
                        <x-svg.check wire:loading.remove wire:target="save" />
                        <x-svg.loading wire:loading wire:target="save" />
                    </x-slot>

                    Save
                </x-layout.button>
            </div>
        </div>
    </form>
</div>