<?php

namespace App\Providers;

use App\Models\Staff;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        VerifyEmail::toMailUsing(function ($notifiable, $url) {

            Alert::success('Linkul a fost trimis!', 'A fost trimis un link la adresa ' . $notifiable->email . ' pentru validarea contului de utilizator')
                ->persistent(true, false);

            return (new MailMessage)
                ->view('front.emails.verify-email', ['url' => $url])
                ->subject('Validare cont emag');
        });

        //gate manager
        Gate::define('manager', function (Staff $staff) {
            return $staff->type == 'manager';
        });
    }
}
