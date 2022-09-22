<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;


class ChangePosition extends Component
{
    public $position;

    public $model;

    public function mount($model)
    {
        $this->model = $model;
        $this->position = $model->position;
    }

    public function updatedPosition($value)
    {
        $this->model->position = $value;
        $this->model->save();
        $this->emitUp('positionUp');
    }


    public function render()
    {
        return view('livewire.admin.change-position');
    }
}
