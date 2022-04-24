<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Address;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::whereNotNull('email_verified_at')->get();

        foreach ($users as $user) {
            $user->addresses()->saveMany(Address::factory(rand(0, 3))->make());
        }
    }
}
