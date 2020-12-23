<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;

class ViewAdmins extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.view-admins', [
            'admins' => $this->getAdmins()
        ])->layout('components.layout');
    }

    public function getAdmins()
    {
        return Admin::paginate(10);
    }
}
