<?php

namespace App\Http\Livewire\Forms;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UserForm extends Component
{
    public User $user;
    public $password;
    public bool $isCreate = true;

    public function mount()
    {
        $this->isCreate = !isset($this->user);

        $this->user ??= new User();
    }

    public function updatedUserName($name)
    {
        $this->user->username = User::makeSlug($name, $this->user->id);
        $this->validateOnly('user.username');
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function render()
    {
        return view('livewire.forms.user-form')
            ->layout('components.layout');
    }

    public function save()
    {
        $this->validate();

        if($this->password)
            $this->user->password = bcrypt($this->password);

        $this->user->save();

        $this->resetForm();

        session()->flash('success', 'User Saved Successfully');
    }

    public function rules()
    {
        $rules = [
            'user.name' => 'required',
            'user.username' => 'required|unique:users,username',
            'user.email' => 'email|required|unique:users,email',
            'user.phone' => 'required|required:users,phone',
            'password' => 'required|min:6|max:64',
        ];

        if(!$this->isCreate) {
            $rules['password'] = 'nullable|min:6|max:64';

            $rules['user.username'] = [
                'required',
                Rule::unique('users', 'username')->ignore($this->user->id),
            ];

            $rules['user.email'] = [
                'required',
                Rule::unique('users', 'email')->ignore($this->user->id),
            ];

            $rules['user.phone'] = [
                'required',
                Rule::unique('users', 'phone')->ignore($this->user->id),
            ];
        }

        return $rules;
    }

    private function resetForm()
    {
        if(!$this->isCreate)
            return;

        $this->user = new User();

        $this->password = null;
    }
}
