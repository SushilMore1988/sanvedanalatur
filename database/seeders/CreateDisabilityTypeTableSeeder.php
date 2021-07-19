<?php

namespace Database\Seeders;

use App\Models\DisabilityType;
use Illuminate\Database\Seeder;

class CreateDisabilityTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DisabilityType::insert([
            ['type' => 'Acid Attack Victim'],
            ['type' => 'Autism Spectrum Disorder'],
            ['type' => 'Blindness'],
            ['type' => 'Cerebral Palsy'],
            ['type' => 'Chronic Neurological Conditions'],
            ['type' => 'Hearing Impairment'],
            ['type' => 'Hemophilia'],
            ['type' => 'Intellectual Disability'],
            ['type' => 'Leprosy cured'],
            ['type' => 'Locomotor Disability'],
            ['type' => 'Low Vision'],
            ['type' => 'Mental Illness'],
            ['type' => 'Multiple Disabilities including Deaf Blindness'],
            ['type' => 'Multiple Sclerosis'],
            ['type' => 'Muscular Dystrophy'],
            ['type' => 'Parkinson\'s Disease'],
            ['type' => 'Short Stature\\Dwarfism'],
            ['type' => 'Sickle Cell Disease'],
            ['type' => 'Specific Learning Disabilities'],
            ['type' => 'Speech and Language Disability'],
            ['type' => 'Thalassemia']
        ]);
    }
}
