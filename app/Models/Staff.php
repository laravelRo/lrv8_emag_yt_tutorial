<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Authenticatable
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function photoUrl()
    {
        return '/admin/images/staff/' . $this->photo;
    }
    public function photoPath()
    {
        return 'admin/images/staff/' . $this->photo;
    }
}
