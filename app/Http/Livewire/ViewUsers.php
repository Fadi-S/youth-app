<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ViewUsers extends Component
{
    public function render()
    {
        return view('livewire.view-users', [
            'users' => $this->getUsers(),
        ])->layout('components.layout');
    }

    public function getUsers()
    {
        return User::paginate(10);
    }
}
