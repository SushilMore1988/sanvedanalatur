<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class CreateTalukaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $district = District::where('name', 'Latur')->first();

        $district->talukas()->createMany([
            ['name' => 'Latur'],
            ['name' => 'Ahmadpur'],
            ['name' => 'Ausa'],
            ['name' => 'Udgir'],
            ['name' => 'Chakur'],
            ['name' => 'Jalkot'],
            ['name' => 'Nilanga'],
            ['name' => 'Devani'],
            ['name' => 'Shiruranantpal'],
            ['name' => 'Renapur'],
        ]);
    }
}
