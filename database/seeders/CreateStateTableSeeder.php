<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CreateStateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = Country::where('name', 'India')->first();
        $country->states()->createMany([
                                        ['name' => 'Andaman and Nicobar Islands'],
                                        ['name' => 'Andhra Pradesh'],
                                        ['name' => 'Arunachal Pradesh'],
                                        ['name' => 'Assam'],
                                        ['name' => 'Bihar'],
                                        ['name' => 'Chandigarh'],
                                        ['name' => 'Chhattisgarh'],
                                        ['name' => 'Dadra and Nagar Haveli'],
                                        ['name' => 'Daman and Diu'],
                                        ['name' => 'Delhi'],
                                        ['name' => 'Goa'],
                                        ['name' => 'Gujarat'],
                                        ['name' => 'Haryana'],
                                        ['name' => 'Himachal Pradesh'],
                                        ['name' => 'Jammu and Kashmir'],
                                        ['name' => 'Jharkhand'],
                                        ['name' => 'Karnataka'],
                                        ['name' => 'Kenmore'],
                                        ['name' => 'Kerala'],
                                        ['name' => 'Lakshadweep'],
                                        ['name' => 'Madhya Pradesh'],
                                        ['name' => 'Maharashtra'],
                                        ['name' => 'Manipur'],
                                        ['name' => 'Meghalaya'],
                                        ['name' => 'Mizoram'],
                                        ['name' => 'Nagaland'],
                                        ['name' => 'Narora'],
                                        ['name' => 'Natwar'],
                                        ['name' => 'Odisha'],
                                        ['name' => 'Paschim Medinipur'],
                                        ['name' => 'Pondicherry'],
                                        ['name' => 'Punjab'],
                                        ['name' => 'Rajasthan'],
                                        ['name' => 'Sikkim'],
                                        ['name' => 'Tamil Nadu'],
                                        ['name' => 'Telangana'],
                                        ['name' => 'Tripura'],
                                        ['name' => 'Uttar Pradesh'],
                                        ['name' => 'Uttarakhand'],
                                        ['name' => 'Vaishali'],
                                        ['name' => 'West Bengal']
                                    ]);
    }
}
