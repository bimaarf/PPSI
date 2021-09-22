<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Path;
class PathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Path::create([
            'path' => 'A'
        ]);

    }

}
