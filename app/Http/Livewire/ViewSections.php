<?php

namespace App\Http\Livewire;

use App\Models\Section;
use Livewire\Component;
use Livewire\WithPagination;

class ViewSections extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.view-sections', [
            'sections' => $this->getSections()
        ])->layout('components.layout');
    }

    public function getSections()
    {
        return Section::paginate(10);
    }
}
