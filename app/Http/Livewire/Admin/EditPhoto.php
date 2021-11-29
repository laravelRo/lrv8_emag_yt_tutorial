<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Content\Photo;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;

class EditPhoto extends Component
{
    use WithFileUploads;

    public $photo;

    public $current;
    public $position;
    public $title;
    public $description;

    public $image;
    public $path;

    public $currentUrl;


    public function mount(Photo $photo)
    {

        $this->position = $this->photo->position;
        $this->title = $this->photo->title;
        $this->description = $this->photo->description;
        $this->currentUrl = url()->current();
    }


    //updatam campul position
    public function updatedPosition($value)
    {

        $this->photo->position = $value;
        $this->photo->save();



        return redirect(request()->header('Referer'));

        // return redirect()->to($this->currentUrl);
    }

    //updatam campul title
    public function updatedTitle($value)
    {
        $this->photo->title = $value;
        $this->photo->save();
    }

    //updatam campul description
    public function updatedDescription($value)
    {
        $this->photo->description = $value;
        $this->photo->save();
    }

    //updatam imaginea din galerie
    public function updatedImage($value)
    {
        $this->validate(
            [
                'image' => 'image|max:1024', // 1MB Max
            ],
            [
                'image.max' => 'Imaginea este mai mare de 1MB si nu poate fi incarcata'
            ]
        );

        //stergem fizic vechea imagine de pe hdd
        Storage::disk('photos')->delete($this->path . $this->photo->name);

        //setam numele fisierului stocat
        $photo_name = Str::random(4) . '_' . $this->image->getClientOriginalName();

        //salvam noua imagine pe hdd
        $value->storeAs($this->path, $photo_name, 'photos');
        $this->photo->name = $photo_name;
        $this->photo->save();

        $this->image = null;

        $this->deleteOldTempFiles();
    }

    public function deleteOldTempFiles()
    {
        $oldFiles = Storage::files('livewire-tmp');

        foreach ($oldFiles as $file) {
            Storage::delete($file);
        }
    }




    // protected function cleanupOldUploads()
    // {

    //     $storage = Storage::disk('local');

    //     foreach ($storage->allFiles('livewire-tmp') as $filePathname) {
    //         // On busy websites, this cleanup code can run in multiple threads causing part of the output
    //         // of allFiles() to have already been deleted by another thread.
    //         if (!$storage->exists($filePathname)) continue;

    //         $yesterdaysStamp = now()->subSeconds(3)->timestamp;
    //         if ($yesterdaysStamp > $storage->lastModified($filePathname)) {
    //             $storage->delete($filePathname);
    //         }
    //     }
    // }



    public function render()
    {
        return view('livewire.admin.edit-photo');
    }
}
