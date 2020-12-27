<?php

namespace App\Http\Livewire\Forms;

use App\Models\Section;
use App\Models\Task;
use Livewire\Component;
use Livewire\WithFileUploads;

class SectionForm extends Component
{
    use WithFileUploads;

    public Section $section;
    public $picture;
    public $tasks = [];
    public bool $isCreate = true;
    public int $step = 1;

    protected $queryString = [
        'step' => ['except' => 1],
    ];

    public function render()
    {
        return view('livewire.forms.section-form')
            ->layout('components.layout');
    }

    protected $rules = [
        'section.name' => 'required',
        'picture' => "nullable|image",
        'tasks.*.title' => 'required',
        'tasks.*.date' => 'date'
    ];

    public function mount()
    {
        $this->isCreate = !isset($this->section);

        $this->section ??= new Section();

        $this->tasks = $this->section->tasks->toArray();
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function save()
    {
        $this->validate();

        $this->section->slug = Section::makeSlug($this->section->name, $this->section->id);

        $this->section->save();

        $this->section->savePicture($this->picture);

        $this->resetForm();

        $this->step = 2;

        session()->flash('success', 'Section Saved Successfully');
    }

    public function addTask()
    {
        $this->tasks[] = new Task();
    }

    public function saveTasks()
    {
        $tasks = collect($this->tasks)
            ->mapInto(Task::class);

        $this->section->tasks()->truncate();
        $this->section->tasks()->saveMany($tasks);

        session()->flash('success', 'Tasks Saved Successfully');
    }

    public function removeTask($key)
    {
        unset($this->tasks[$key]);
    }

    private function resetForm()
    {
        if(!$this->isCreate)
            return;

        $this->picture = null;

        $this->tasks = [];

        $this->step = 1;

        $this->section = new Section();
    }
}
