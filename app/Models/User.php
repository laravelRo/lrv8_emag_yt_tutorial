<?php

namespace App\Models;

use App\Models\shop\Coupon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //relatia one-to-many user has many addresses
    public function addresses()
    {
        return $this->hasMany(Address::class, 'user_id');
    }

    //relatia one-to-many user - orders
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }


    //relatia polimorfica many-to-many coupoane
    public function coupons()
    {
        return $this->morphToMany(Coupon::class, 'couponable');
    }

    public function couponsActive()
    {
        return $this->morphToMany(Coupon::class, 'couponable')
            ->where('active', true)
            ->where('expired_at', '>', now())
            ->get();
    }

    /**
     * Send a password reset notification to the user.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $url = route('password.reset', ['token' => $token, 'email' => $this->email]);

        $this->notify(new ResetPasswordNotification($url));
    }
}
