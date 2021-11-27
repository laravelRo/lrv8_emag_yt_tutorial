<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;


class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['blockUser', 'activateUser', 'deleteUser'];

    public $searchName = "";

    public $publicUsers = 'public';
    private $users = Null;

    public function updatedSearchName()
    {
        $this->resetPage();
    }


    public function blockUser($id)
    {
        $user = User::findOrFail($id)->delete();
    }


    public function activateUser($id)
    {
        $user = User::onlyTrashed()->where('id', $id)->first();
        if (isset($user)) {
            $user->restore();
        }
    }

    public function deleteUser($id)
    {
        $user = User::onlyTrashed()->where('id', $id)->first();
        if (isset($user)) {
            $user->forceDelete();
        }
    }

    public function validateEmail($id)
    {
        $user = User::findOrFail($id);
        $user->markEmailAsVerified();
    }
    public function invalidateEmail($id)
    {
        $user = User::findOrFail($id);
        $user->email_verified_at = null;
        $user->save();
    }

    public function showUsers($status)
    {
        $this->resetPage();
        $this->publicUsers = $status;
    }

    public function render()
    {

        if ($this->publicUsers == 'public') {
            $users = User::where('name', 'Like', "%$this->searchName%")
                ->orWhere('email', 'Like', "%$this->searchName%")
                ->orderBy('name')
                ->paginate(15);
        }

        if ($this->publicUsers == 'blocked') {
            $users = User::onlyTrashed()
                ->where(function ($query) {
                    $query->where('name', 'Like', "%$this->searchName%");
                    $query->orWhere('email', 'Like', "%$this->searchName%");
                })
                ->orderBy('name')
                ->paginate(15);
        }


        return view('livewire.admin.users')
            ->with('users', $users);
    }
}
