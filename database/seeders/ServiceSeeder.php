<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Service::count() == 0)
        {

            $user = User::create([
                'name' => 'Zeeshan',
                'phone' => '03128762661',
                'email' => 'zeeshan@gmail.com',
                'password' => Hash::make('123456'),
                'user_role' => 'doctor'
            ]);

            Service::create([
                'user_id' => $user->id,
                'name' => 'Service 1',
                'duration' => '30',
                'price' => '10'
            ]);

            $user2 = User::create([
                'name' => 'Syed Raza',
                'phone' => '03128762662',
                'email' => 'raza@gmail.com',
                'password' => Hash::make('123456'),
                'user_role' => 'doctor'
            ]);

            Service::create([
                'user_id' => $user2->id,
                'name' => 'Service 2',
                'duration' => '20',
                'price' => '15'
            ]);
        }
    }
}
