<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class SectionsStatus extends Component
{
    public $model;

    // public $section;

    public $show_standard = true;




    public function mount($model)
    {
        $this->model = $model;
    }

    public function changeStatus($property)
    {
        $this->model->$property = !$this->model->$property;
        $this->model->save();
    }
    public function render()
    {
        return view('livewire.admin.sections-status');
    }
}
