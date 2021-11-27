<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Content\Photo;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PhotosUpload extends Component
{
    use WithFileUploads;

    public $photos = [];

    public $currentUrl;

    public $model;
    public $path;
    public $images;


    protected $listeners = ['deletePhoto', 'deleteGallery'];


    public function mount($model)
    {
        $this->images = $model->photos()->orderBy('position')->get();
    }





    public function save()
    {
        $this->validate(
            [
                'photos.*' => 'image|max:1024', // 1MB Max
            ],
            [
                'photos.*.max' => "Imaginile trebuie sa fie de cel mult 1 MB",
                'photos.*.image' => "Fisierele trebuie sa fie de tip imagine"
            ]

        );
        $maxPosition = $this->model->photos()->max('position');

        foreach ($this->photos as $key => $photo) {
            //setam numele fisierului stocat
            $photo_name = Str::random(4) . '_' . $photo->getClientOriginalName();

            //stochez fizic imaginea pe discul photos
            $photo->storeAs($this->path, $photo_name, 'photos');
            // /public/photos/categories/25/photo_name

            //creem inregistrarea noua pentru photos in memorie
            $photo = new Photo;
            $photo->name = $photo_name;
            $photo->position = $maxPosition + (($key + 1) * 10);

            //salvam inregistrarea in table
            $this->model->photos()->save($photo);
        }

        //emitem un eveniment javascript pentru lansarea sweetalert
        $nr = count($this->photos);
        $message = "Au fost incarcate pe hdd si salvate in baza de date " . $nr . " fotografii";
        $this->emit('photosUploaded', $message);

        session()->flash('success', 'Imaginile au fost uploadate cu succes.');
        $this->photos = null;
        $this->images = $this->model->photos()->orderBy('position')->get();
    }

    protected function cleanupOldUploads()
    {

        $storage = Storage::disk('local');

        foreach ($storage->allFiles('livewire-tmp') as $filePathname) {
            // On busy websites, this cleanup code can run in multiple threads causing part of the output
            // of allFiles() to have already been deleted by another thread.
            if (!$storage->exists($filePathname)) continue;

            $yesterdaysStamp = now()->subSeconds(3)->timestamp;
            if ($yesterdaysStamp > $storage->lastModified($filePathname)) {
                $storage->delete($filePathname);
            }
        }
    }

    public function deletePhoto($id)
    {
        $photo = Photo::findOrFail($id);

        Storage::disk('photos')->delete($this->path  . $photo->name);
        $photo->delete();

        return redirect(request()->header('Referer'));
    }



    public function deleteGallery()
    {
        //stergem toate imaginile din baza de date
        foreach ($this->model->photos as $key => $image) {

            $image->delete();
        }
        //stergem imaginile de pe hdd
        Storage::disk('photos')->deleteDirectory($this->path);
        $this->images = $this->model->photos()->orderBy('position')->get();
    }




    public function render()
    {
        $images = $this->images;

        return view(
            'livewire.admin.photos-upload',
            [
                'images' => $images,

            ]
        );
    }
}
