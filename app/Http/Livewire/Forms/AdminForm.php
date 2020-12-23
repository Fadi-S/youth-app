<?php

namespace App\Http\Livewire\Forms;

use App\Models\Admin;
use Fadi\LaravelRole\Role\Role;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AdminForm extends Component
{
    public Admin $admin;
    public $password;
    public $role_id;
    public bool $isCreate = true;

    public function mount()
    {
        $this->isCreate = !isset($this->admin);

        $this->admin ??= new Admin();

        $this->role_id = $this->isCreate ? 0 : $this->admin->role_id;
    }

    public function updatedAdminName($name)
    {
        $this->admin->username = Admin::makeSlug($name, $this->admin->id);
        $this->resetErrorBag('admin.username');
    }

    public function updated($field)
    {
        $this->validateOnly($field);

        $this->resetErrorBag($field);
    }

    public function render()
    {
        return view('livewire.forms.admin-form', [
            'roles' => Role::pluck('name', 'id'),
        ])->layout('components.layout');
    }

    public function save()
    {
        $this->validate();

        if($this->password)
            $this->admin->password = bcrypt($this->password);

        $this->admin->role_id = $this->role_id;

        $this->admin->save();

        $this->resetForm();

        session()->flash('success', 'User Saved Successfully');
    }

    public function rules()
    {
        $rules = [
            'admin.name' => 'required',
            'admin.username' => 'required|unique:admins,username',
            'admin.email' => 'email|required|unique:admins,email',
            'password' => 'required|min:6|max:64',
            'role_id' => 'required|exists:roles,id',
        ];

        if(!$this->isCreate) {
            $rules['password'] = 'nullable|min:6|max:64';

            $rules['admin.username'] = [
                'required',
                Rule::unique('admins', 'username')->ignore($this->admin->id),
            ];

            $rules['admin.email'] = [
                'required',
                Rule::unique('admins', 'email')->ignore($this->admin->id),
            ];
        }

        return $rules;
    }

    private function resetForm()
    {
        if(!$this->isCreate)
            return;

        $this->admin = new Admin();

        $this->password = null;
        $this->role_id = 0;
    }
}
