<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ProductPhoto extends Component
{
    use WithFileUploads;

    public $model;
    public $photo;
    public $default_image;
    public $folder;

    public function updatedPhoto($value)
    {
        //validam noua imagine
        $this->validate(
            [
                'photo' => 'image|max:1024'
            ],
            [
                'photo.max' => 'Imaginea nu poate avea mai mult de 1 MB'
            ]
        );

        //stergem vechea imagine de pe hdd
        if (!($this->model->photo == $this->default_image)) {
            Storage::disk('content')->delete($this->folder . '/' . $this->model->photo);
        }

        //setam numele noii imagini
        $photo_name = Str::slug($this->model->name) . '_' . $this->model->id . '_' . Str::random(3) .  '.'  . $value->getClientOriginalExtension();

        //salvam noua imagine pe hdd
        $value->storeAs($this->folder, $photo_name, 'content');

        //salvam numele imaginii pentru produs
        $this->model->photo = $photo_name;
        $this->model->save();

        //stergem fisierele temporare
        $this->photo = null;
        $this->deleteTempFiles();
    }

    public function deleteTempFiles()
    {
        $storage = Storage::disk('local');
        $oldFiles = Storage::files('livewire-tmp');

        foreach ($oldFiles as $file) {
            // if (!$storage->exists($file)) continue;
            Storage::delete($file);
        }
    }

    public function render()
    {
        return view('livewire.admin.product-photo');
    }
}
