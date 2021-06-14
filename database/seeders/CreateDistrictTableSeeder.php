<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class CreateDistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state = State::where('name', 'Maharashtra')->first();
        $state->districts()->createMany([
            ['name' => 'Ahmednagar'],
            ['name' => 'Akola'],
            ['name' => 'Amravati'],
            ['name' => 'Aurangabad'],
            ['name' => 'Beed'],
            ['name' => 'Bhandara'],
            ['name' => 'Buldhana'],
            ['name' => 'Chandrapur'],
            ['name' => 'Dhule'],
            ['name' => 'Gadchiroli'],
            ['name' => 'Gondia'],
            ['name' => 'Hingoli'],
            ['name' => 'Jalgaon'],
            ['name' => 'Jalna'],
            ['name' => 'Kolhapur'],
            ['name' => 'Latur'],
            ['name' => 'Mumbai City'],
            ['name' => 'Mumbai Suburban'],
            ['name' => 'Nagpur'],
            ['name' => 'Nanded'],
            ['name' => 'Nandurbar'],
            ['name' => 'Nashik'],
            ['name' => 'Osmanabad'],
            ['name' => 'Palghar'],
            ['name' => 'Parbhani'],
            ['name' => 'Pune'],
            ['name' => 'Raigad'],
            ['name' => 'Ratnagiri'],
            ['name' => 'Sangli'],
            ['name' => 'Satara'],
            ['name' => 'Sindhudurg'],
            ['name' => 'Solapur'],
            ['name' => 'Thane'],
            ['name' => 'Wardha'],
            ['name' => 'Washim'],
            ['name' => 'Yavatmal'],
        ]);
    }
}
