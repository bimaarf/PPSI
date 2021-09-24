<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\ZoneSeeder;
use Illuminate\Database\Seeder;
use App\Models\Zone;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ZoneSeeder::class);
        User::insert([
            [
                'name'  => 'bimaarifa',
                'email' => 'bimaarifa5@gmail.com',
                'password' => Hash::make('miemiechen01')

            ],
            [
                'name'  => 'shipper',
                'email' => 'shipper@gmail.com',
                'password' => Hash::make('miemiechen01')

            ],
            [
                'name'  => 'driver1',
                'email' => 'driver1@gmail.com',
                'password' => Hash::make('miemiechen01')
            ],
            [
                'name'  => 'driver2',
                'email' => 'driver2@gmail.com',
                'password' => Hash::make('miemiechen01')
            ],
            [
                'name'  => 'driver3',
                'email' => 'driver3@gmail.com',
                'password' => Hash::make('miemiechen01')
            ]
        ]);

        // $this->command->info('Zone table seeded!');

    }
}
